<?php
namespace GroceryCrud\Core\State;

use GroceryCrud\Core\GroceryCrud as GCrud;
use GroceryCrud\Core\Render\RenderAbstract;
use GroceryCrud\Core\Model;
use GroceryCrud\Core\Helpers\ArrayHelper;

class DatagridState extends StateAbstract {

    /**
     * MainState constructor.
     * @param GCrud $gCrud
     */
    function __construct(GCrud $gCrud)
    {
        $this->gCrud = $gCrud;
        $this->setModel();
    }

    public function getStateParameters()
    {
        return (object)array(
            'search' => $this->getSearchData(),
            'page' => !empty($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : null,
            'per_page' => !empty($_GET['per_page']) ? $_GET['per_page'] : null,
            'sorting' => !empty($_GET['sorting']) ? $_GET['sorting'] : null,
            'order_by' => !empty($_GET['order_by']) ? $_GET['order_by'] : null
        );
    }

    public function getSearchData() {
        $searchData = !empty($_GET['search']) ? $_GET['search'] : null;
        $dateFields = array_merge($this->getColumnDateFields(), $this->getColumnDatetimeFields());

        $dateFormatData = $this->getDateFormatData();

        $dateNeedsFormatting = $dateFormatData->dateNeedsFormatting;

        if ($dateNeedsFormatting) {
            $dateRegex = $dateFormatData->dateRegex;
            $replacementString = $dateFormatData->replacementString;

            if ($searchData !== null) {
                foreach ($searchData as $searchName => $searchValue) {
                    if (in_array($searchName, $dateFields)) {
                        $searchData[$searchName] = preg_replace($dateRegex, $replacementString, $searchValue);
                    }
                }
            }
        }

        return $searchData;
    }

    public function initialize($stateParameters)
    {
        if ($stateParameters->search !== null) {
            $this->setFilters($stateParameters->search);
        }
    }

    protected function _getRelationalColumns($columns) {
        $relational_fields = array_keys($this->gCrud->getRelationNtoN());

        $relational_columns = [];
        foreach ($columns as $rowNum => $columnName) {
            if (in_array($columnName, $relational_fields)) {
                $relational_columns[] = $columns[$rowNum];
            }
        }

        return $relational_columns;
    }



    public function setDatagridColumns() {

        $callbackColumns = $this->gCrud->getCallbackColumns();

        // GC-228: In order to solve the problem that not all the row is available in a callback column
        // we did create the below logic so we will get all the columns and filter them at the end
        if (empty($callbackColumns)) {
            $this->setColumns();
        } else {
            $allColumns = $this->getColumnNames();
            $this->gCrud->getModel()->setColumns($this->removeRelationalColumns($allColumns));
        }
    }

    public function getData() {
        $stateParameters = $this->getStateParameters();
        $config = $this->getConfigParameters();

        $this->setInitialData();
        $this->initialize($stateParameters);

        $model = $this->gCrud->getModel();

        $allColumns = $this->getColumns(StateAbstract::WITH_PRIMARY_KEY);

        $this->setDatagridColumns();

        $model->setPrimaryKey($this->getPrimaryKeyName());

        $defaultOrderBy = $this->gCrud->getDefaultOrderBy();

        if ($defaultOrderBy !== null && $stateParameters->order_by === null) {
            $model->setDefaultOrderBy($defaultOrderBy->ordering, $defaultOrderBy->sorting);
        }

        if ($stateParameters->order_by !== null) {
            $model->setOrderBy($stateParameters->order_by);

            if ($stateParameters->sorting !== null) {
                $model->setSorting($stateParameters->sorting);
            }
        }

        if ($stateParameters->per_page !== null) {
            $model->setLimit($stateParameters->per_page);
        } else {
            $model->setLimit($config['default_per_page']);
        }

        if ($stateParameters->page !== null) {
            $model->setPage($stateParameters->page);
        }

        if (!empty($this->filtersAnd)) {
            $model->setAndFilters($this->filtersAnd);
        }

        if (!empty($this->filtersOr)) {
            $model->setOrFilters($this->filtersOr);
        }

        if ($this->gCrud->getWhere() !== null) {
            $model->setWhere($this->gCrud->getWhere());
        }

        $model->setRelationalColumns($this->_getRelationalColumns($allColumns));

        $relations1toN = $this->getRelations1ToN();
        foreach ($relations1toN as $num_row => $relation) {
            if (strstr($relation->titleField, '{')) {
                $relations1toN[$num_row]->titleField = $this->getFieldsArray($relation->titleField);
            }
        }

        $model->setRelations1ToN($this->getRelations1ToN());
        $model->setRelationNToN($this->getRelationsNToN());

        $model = $this->gCrud->getModel();

        $results = $model->getList();

        $output = (object)array();
        $output->filtered_total = $model->getTotalItems();
        $output->data = $results;

        return $output;
    }

    public function render()
    {
        $output = $this->getData();
        $output->data = $this->enhanceColumnResults($output->data);
        $output->data = $this->filterResults($output->data);

        $render = new RenderAbstract();

        $render->output = json_encode($output);
        $render->outputAsObject = $output;
        $render->isJSONResponse = true;

        return $render;

    }

    public function filterResults($results) {
        $callbackColumns = $this->gCrud->getCallbackColumns();

        // GC-228: If we don't have any callback columns we don't really need to filter the data
        if (empty($callbackColumns)) {
            return $results;
        }

        $columnNames = $this->getColumns(StateAbstract::WITH_PRIMARY_KEY);
        $columnNames[] = 'grocery_crud_extras';
        $finalResults = [];

        foreach ($results as $row) {
            $tmpRow = [];
            foreach ($row as $fieldName => $fieldValue) {
                if (in_array($fieldName, $columnNames)) {
                    $tmpRow[$fieldName] = $fieldValue;
                }
            }
            $finalResults[] = $tmpRow;
        }

        return $finalResults;
    }

    public function _getCommonData()
    {
        $data = (object)array();

        $data->subject 				= $this->gCrud->getSubject();
        $data->subject_plural 		= $this->gCrud->getSubjectPlural();

        return $data;
    }
}