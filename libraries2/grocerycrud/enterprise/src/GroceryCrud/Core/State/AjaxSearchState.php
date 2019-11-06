<?php
namespace GroceryCrud\Core\State;

use GroceryCrud\Core\GroceryCrud as GCrud;
use GroceryCrud\Core\Render\RenderAbstract;
use GroceryCrud\Core\Model;

class AjaxSearchState extends StateAbstract {

    /**
     * MainState constructor.
     * @param GCrud $gCrud
     */
    function __construct(GCrud $gCrud)
    {
        $this->gCrud = $gCrud;
    }

    public function getStateParameters()
    {
        return (object)array(

        );
    }

    public function render()
    {
        $stateParameters = $this->getStateParameters();

        $output = (object) [
            'results' => [
                (object) [
                    'id' => '1',
                    'value' => 'One'
                ],
                (object) [
                    'id' => '2',
                    'value' => 'Two'
                ],
                (object) [
                    'id' => '3',
                    'value' => 'Three'
                ]
            ]
        ];

        $render = new RenderAbstract();

        $render->output = json_encode($output);
        $render->outputAsObject = $output;
        $render->isJSONResponse = true;

        return $render;

    }

}