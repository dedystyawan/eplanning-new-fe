<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['ajax/(:any)'] = 'main/ajax/$1';
$route['ajax'] = 'main/ajax';
// $route['logout'] = 'main/logout';
$route['rekrutmen'] = 'main/rekrutmen';
$route['lamaran'] = 'member/lamaran';
$route['forgot'] = 'main/forgot';
$route['register'] = 'main/register';
// $route['login'] = 'main/login';
$route['reset'] = 'main/reset';

//PANEL Routes
$route['pemuda142/login'] = 'pemuda142/main/login';
$route['pemuda142/logout'] = 'pemuda142/main/logout';


//--route RK
//----route Dokumen RK
$route['rk/dokumen-rk/(:any)'] = 'dokumen/vdoc/$1';


//--route RBB
//----route Dokumen RBB
$route['rbb/dokumen-rbb/(:any)'] = 'dokumen/vdoc/$1';
//----route RKF
$route['rbb/rkf'] = 'rbb/rkf/rkf'; //dashboard RKF
$route['rbb/rkf/show'] = 'rbb/rkf/rkf/show_rkf'; //  data rkf 
$route['rbb/rkf/show/(:any)'] = 'rbb/rkf/rkf/show_rkf_filter/$1'; //  data rkf 
// $route['rbb/rkf/show-pic'] = 'rbb/rkf/rkf/show_rkf'; //  data rkf 
$route['rbb/rkf/show-new'] = 'rbb/rkf/rkf/show_rkf_next'; //  data rkf baru 
$route['rbb/rkf/show-detail/(:any)'] = 'rbb/rkf/rkf/show_detail_rkf/$1'; //show detail rkf
$route['rbb/rkf/show-report/(:any)/(:any)'] = 'rbb/rkf/rkf/reportrkf/$1/$2'; // report rkf
$route['rbb/rkf/form'] = 'rbb/rkf/rkf/form_rkf'; // form input new rkf
$route['rbb/rkf/edit/(:any)'] = 'rbb/rkf/rkf/form_edit_rkf/$1'; //form edit new rkf
$route['rbb/rkf/cetak/(:any)'] = 'rbb/rkf/rkf/cetak/$1'; //cetak rkf
$route['rbb/rkf/otor/(:any)'] = 'rbb/rkf/rkf/otor/$1';
$route['rbb/rkf/sfl/(:any)/(:any)'] = 'rbb/rkf/rkf/v_support/$1/$2';
$route['rbb/rkf/show-detail-sfl/(:any)'] = 'rbb/rkf/rkf/v_support_detail/$1'; //show detail rkf_sfl
$route['rbb/rkf/approve-sfl'] = 'rbb/rkf/rkf/approve_support'; //show detail rkf_sfl


//----route Aktivitas
$route['rbb/rkf/aktivitas/show-report/(:any)'] = 'rbb/rkf/aktivitas/laporanmonev/$1'; //
$route['rbb/rkf/aktivitas/input/(:any)'] = 'rbb/rkf/aktivitas/inputbreakdownrkf/$1'; // form input new aktivitas dan melihat datanya
$route['rbb/rkf/aktivitas/insert'] = 'rbb/rkf/aktivitas/addbreakdownrkf'; //controller insert data aktivitas baru
$route['rbb/rkf/aktivitas/edit'] = 'rbb/rkf/aktivitas/editbdajax'; //controller edit aktivitas
$route['rbb/rkf/aktivitas/delete'] = 'rbb/rkf/aktivitas/deletebdajax'; //controller delete aktivitas
$route['rbb/rkf/monev/input/(:any)'] = 'rbb/rkf/monev/monev_rkf/$1'; // menuju ke detail dimana ada button go to monev
$route['rbb/rkf/monev/show/(:any)/(:any)'] = 'rbb/rkf/monev/v_monev/$1/$2';
$route['rbb/rkf/monev/insert'] = 'rbb/rkf/monev/laporaktivitasajax2';
$route['rbb/rkf/monev/otor'] = 'rbb/rkf/monev/otor_monev2';
//----routeRKO
$route['rbb/rko'] = 'rbb/rko/rko'; //dashboar RKO
$route['rbb/rko/jarkan'] = 'rbb//rko/jarkan2/dashboard';
$route['rbb/rko/jarkan/input'] = 'rbb/rko/jarkan2/form';
$route['rbb/rko/jarkan/insert-pembukaan'] = 'rbb/rko/jarkan2/insert_pembukaan';
$route['rbb/rko/jarkan/insert-perubahan'] = 'rbb/rko/jarkan2/insert_perubahan';
$route['rbb/rko/jarkan/insert-relokasi'] = 'rbb/rko/jarkan2/insert_relokasi';
$route['rbb/rko/jarkan/insert-penutupan'] = 'rbb/rko/jarkan2/insert_penutupan';
//-----rkbu
$route['rbb/rko/rkbu'] = 'rbb/rko/rkbu/index';
$route['rbb/rko/rkbu/input'] = 'rbb/rko/rkbu/form_input';
$route['rbb/rko/rkbu/insert'] = 'rbb/rko/rkbu/insert_rkbu';
$route['rbb/rko/rkbu/delete/(:any)'] = 'rbb/rko/rkbu/delete_rkbu/$1';
$route['rbb/rko/rkbu/edit/(:any)'] = 'rbb/rko/rkbu/edit_rkbu/$1';
$route['rbb/rko/rkbu/update/(:any)'] = 'rbb/rko/rkbu/update_rkbu/$1';
//-----bangun renov
$route['rbb/rko/bangren'] = 'rbb/rko/bangren/index';
$route['rbb/rko/bangren/input'] = 'rbb/rko/bangren/form_input';
$route['rbb/rko/bangren/insert'] = 'rbb/rko/bangren/insert_bangren';
$route['rbb/rko/bangren/delete/(:any)'] = 'rbb/rko/bangren/delete_bangren/$1';
$route['rbb/rko/bangren/edit/(:any)'] = 'rbb/rko/bangren/edit_bangren/$1';
$route['rbb/rko/bangren/update/(:any)'] = 'rbb/rko/bangren/update_bangren/$1';





//--route RAKB
$route['rakb'] = 'rakb/rakb';


//admin
$route['rbb/rko/jarkan/insert-penutupan'] = 'admin/dashboard_rkf_admin';
