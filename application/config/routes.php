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
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//custom
$route['user/accountset/changepassword'] = 'user/changepassword';
$route['user/accountset/changeemail'] = 'user/changeemail';
$route['user/accountset/verification'] = 'user/verification';

$route['master/management'] = 'management';;
$route['master/management/edit'] = 'management/edit/';

$route['master/program'] = 'program';
$route['master/program/get_data_program'] = 'program/get_data_program';
$route['master/program/add'] = 'program/add';
$route['master/program/edit/(:num)'] = 'program/edit/$1';
$route['master/program/delete/(:num)'] = 'program/delete/$1';

$route['master/perguruantinggi'] = 'perguruantinggi';
$route['master/perguruantinggi/get_data_perguruantinggi'] = 'perguruantinggi/get_data_perguruantinggi';
$route['master/perguruantinggi/add'] = 'perguruantinggi/add';
$route['master/perguruantinggi/edit/(:num)'] = 'perguruantinggi/edit/$1';
$route['master/perguruantinggi/delete/(:num)'] = 'perguruantinggi/delete/$1';

$route['master/sekolah'] = 'sekolah';
$route['master/sekolah/get_data_sekolah'] = 'sekolah/get_data_sekolah';
$route['master/sekolah/add'] = 'sekolah/add';
$route['master/sekolah/edit/(:num)'] = 'sekolah/edit/$1';
$route['master/sekolah/delete/(:num)'] = 'sekolah/delete/$1';

$route['master/tahunangkatan'] = 'tahunangkatan';
$route['master/tahunangkatan/get_data_tahunangkatan'] = 'tahunangkatan/get_data_tahunangkatan';
$route['master/tahunangkatan/add'] = 'tahunangkatan/add';
$route['master/tahunangkatan/edit/(:num)'] = 'tahunangkatan/edit/$1';
$route['master/tahunangkatan/delete/(:num)'] = 'tahunangkatan/delete/$1';

$route['master/tahunanggaran'] = 'tahunanggaran';
$route['master/tahunanggaran/get_data_tahunanggaran'] = 'tahunanggaran/get_data_tahunanggaran';
$route['master/tahunanggaran/add'] = 'tahunanggaran/add';
$route['master/tahunanggaran/edit/(:num)'] = 'tahunanggaran/edit/$1';
$route['master/tahunanggaran/delete/(:num)'] = 'tahunanggaran/delete/$1';

$route['master/users'] = 'users';
$route['master/users/get_data_user'] = 'users/get_data_user';
$route['master/users/add'] = 'users/add';
$route['master/users/edit/(:num)'] = 'users/edit/$1';
$route['master/users/delete/(:num)'] = 'users/delete/$1';

$route['kegiatan/rencanakegiatan'] = 'rencanakegiatan';
$route['kegiatan/rencanakegiatan/get_data_rencanakegiatan'] = 'rencanakegiatan/get_data_rencanakegiatan';
$route['kegiatan/rencanakegiatan/add'] = 'rencanakegiatan/add';
$route['kegiatan/rencanakegiatan/edit/(:num)'] = 'rencanakegiatan/edit/$1';
$route['kegiatan/rencanakegiatan/delete/(:num)'] = 'rencanakegiatan/delete/$1';

$route['kegiatan/laporankegiatan'] = 'laporankegiatan';
$route['kegiatan/laporankegiatan/get_data_laporankegiatan'] = 'laporankegiatan/get_data_laporankegiatan';
$route['kegiatan/laporankegiatan/add'] = 'laporankegiatan/add';
$route['kegiatan/laporankegiatan/edit/(:num)'] = 'laporankegiatan/edit/$1';
$route['kegiatan/laporankegiatan/delete/(:num)'] = 'laporankegiatan/delete/$1';

$route['keuangan/rencanaanggaran'] = 'rencanaanggaran';
$route['keuangan/rencanaanggaran/get_data_rencanaanggaran'] = 'rencanaanggaran/get_data_rencanaanggaran';
$route['keuangan/rencanaanggaran/add'] = 'rencanaanggaran/add';
$route['keuangan/rencanaanggaran/addp/(:any)'] = 'rencanaanggaran/addp/$1';
$route['keuangan/rencanaanggaran/addb/(:any)'] = 'rencanaanggaran/addb/$1';
$route['keuangan/rencanaanggaran/preview/(:any)'] = 'rencanaanggaran/preview/$1';
$route['keuangan/rencanaanggaran/edit/(:any)'] = 'rencanaanggaran/edit/$1';
$route['keuangan/rencanaanggaran/delete/(:any)'] = 'rencanaanggaran/delete/$1';
$route['keuangan/rencanaanggaran/deletep/(:any)'] = 'rencanaanggaran/deletep/$1';
$route['keuangan/rencanaanggaran/deleteb/(:any)'] = 'rencanaanggaran/deleteb/$1';
