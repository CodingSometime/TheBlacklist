<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
| Examples:	my-controller/index[http_method]	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// handle http response codes
$route['page/notfound'] = 'HttpResponse/pagenotfound';
$route['page/notauthorize'] = 'HttpResponse/notauthorize';


$route['login'] = 'login';
$route['page/redirect'] = 'login/redirect';
$route['page/logout'] = 'logout/logout';
$route['page/home'] = 'admin/dashboard';


$route['page/allegation-type'] = 'admin/allegationType';
$route['page/allegation-type/index'] = 'admin/allegationType/index/$1';
$route['page/allegation-type/index/(:num)'] = 'admin/allegationType/index/$1';
$route['page/allegation-type/create'] = 'admin/allegationType/create';
$route['page/allegation-type/edit/(:num)'] = 'admin/allegationType/edit/$1';
$route['page/allegation-type/delete/(:num)'] = 'admin/allegationType/delete/$1';
$route['page/allegation-type/save'] = 'admin/allegationType/save';
$route['page/allegation-type/remove/(:num)'] = 'admin/allegationType/remove/$1';
$route['page/allegation-type/validate/(:any)/(:any)'] = 'admin/allegationType/validate/$1/$2';

$route['page/branch'] = 'admin/branch';
$route['page/branch/index'] = 'admin/branch/index/$1';
$route['page/branch/index/(:num)'] = 'admin/branch/index/$1';
$route['page/branch/create'] = 'admin/branch/create';
$route['page/branch/edit/(:num)'] = 'admin/branch/edit/$1';
$route['page/branch/delete/(:num)'] = 'admin/branch/delete/$1';
$route['page/branch/save'] = 'admin/branch/save';
$route['page/branch/remove/(:num)'] = 'admin/branch/remove/$1';
$route['page/branch/validate/(:any)/(:any)/(:any)'] = 'admin/branch/validate/$1/$2/$3';

$route['page/business-unit'] = 'admin/businessUnit';
$route['page/business-unit/index'] = 'admin/businessUnit/index/$1';
$route['page/business-unit/index/(:num)'] = 'admin/businessUnit/index/$1';
$route['page/business-unit/create'] = 'admin/businessUnit/create';
$route['page/business-unit/edit/(:num)'] = 'admin/businessUnit/edit/$1';
$route['page/business-unit/delete/(:num)'] = 'admin/businessUnit/delete/$1';
$route['page/business-unit/save'] = 'admin/businessUnit/save';
$route['page/business-unit/remove/(:num)'] = 'admin/businessUnit/remove/$1';
$route['page/business-unit/validate/(:any)/(:any)'] = 'admin/businessUnit/validate/$1/$2';

$route['page/company'] = 'admin/company';
$route['page/company/index'] = 'admin/company/index/$1';
$route['page/company/index/(:num)'] = 'admin/company/index/$1';
$route['page/company/create'] = 'admin/company/create';
$route['page/company/edit/(:num)'] = 'admin/company/edit/$1';
$route['page/company/delete/(:num)'] = 'admin/company/delete/$1';
$route['page/company/save'] = 'admin/company/save';
$route['page/company/remove/(:num)'] = 'admin/company/remove/$1';
$route['page/company/validate/(:any)/(:any)'] = 'admin/company/validate/$1/$2';

$route['page/country'] = 'admin/country';
$route['page/country/index'] = 'admin/country/index/$1';
$route['page/country/index/(:num)'] = 'admin/country/index/$1';
$route['page/country/create'] = 'admin/country/create';
$route['page/country/edit/(:num)'] = 'admin/country/edit/$1';
$route['page/country/delete/(:num)'] = 'admin/country/delete/$1';
$route['page/country/save'] = 'admin/country/save';
$route['page/country/remove/(:num)'] = 'admin/country/remove/$1';
$route['page/country/validate/(:any)/(:any)'] = 'admin/country/validate/$1/$2';

$route['page/data-source'] = 'admin/dataSource';
$route['page/data-source/index'] = 'admin/dataSource/index/$1';
$route['page/data-source/index/(:num)'] = 'admin/dataSource/index/$1';
$route['page/data-source/create'] = 'admin/dataSource/create';
$route['page/data-source/edit/(:num)'] = 'admin/dataSource/edit/$1';
$route['page/data-source/delete/(:num)'] = 'admin/dataSource/delete/$1';
$route['page/data-source/save'] = 'admin/dataSource/save';
$route['page/data-source/remove/(:num)'] = 'admin/dataSource/remove/$1';
$route['page/data-source/validate/(:any)/(:any)'] = 'admin/dataSource/validate/$1/$2';

$route['page/district'] = 'admin/district';
$route['page/district/index'] = 'admin/district/index/$1';
$route['page/district/index/(:num)'] = 'admin/district/index/$1';
$route['page/district/create'] = 'admin/district/create';
$route['page/district/edit/(:num)'] = 'admin/district/edit/$1';
$route['page/district/delete/(:num)'] = 'admin/district/delete/$1';
$route['page/district/save'] = 'admin/district/save';
$route['page/district/remove/(:num)'] = 'admin/district/remove/$1';
$route['page/district/validate/(:any)/(:any)'] = 'admin/district/validate/$1/$2';

$route['page/group-company'] = 'admin/groupCompany';
$route['page/group-company/index'] = 'admin/groupCompany/index/$1';
$route['page/group-company/index/(:num)'] = 'admin/groupCompany/index/$1';
$route['page/group-company/create'] = 'admin/groupCompany/create';
$route['page/group-company/edit/(:num)'] = 'admin/groupCompany/edit/$1';
$route['page/group-company/delete/(:num)'] = 'admin/groupCompany/delete/$1';
$route['page/group-company/save'] = 'admin/groupCompany/save';
$route['page/group-company/remove/(:num)'] = 'admin/groupCompany/remove/$1';
$route['page/group-company/validate/(:any)/(:any)'] = 'admin/groupCompany/validate/$1/$2';

$route['page/person-type'] = 'admin/personType';
$route['page/person-type/index'] = 'admin/personType/index/$1';
$route['page/person-type/index/(:num)'] = 'admin/personType/index/$1';
$route['page/person-type/create'] = 'admin/personType/create';
$route['page/person-type/edit/(:num)'] = 'admin/personType/edit/$1';
$route['page/person-type/delete/(:num)'] = 'admin/personType/delete/$1';
$route['page/person-type/save'] = 'admin/personType/save';
$route['page/person-type/remove/(:num)'] = 'admin/personType/remove/$1';
$route['page/person-type/validate/(:any)/(:any)'] = 'admin/personType/validate/$1/$2';

$route['page/privilege-type'] = 'admin/privilegeType';
$route['page/privilege-type/index'] = 'admin/privilegeType/index/$1';
$route['page/privilege-type/index/(:num)'] = 'admin/privilegeType/index/$1';
$route['page/privilege-type/create'] = 'admin/privilegeType/create';
$route['page/privilege-type/edit/(:num)'] = 'admin/privilegeType/edit/$1';
$route['page/privilege-type/delete/(:num)'] = 'admin/privilegeType/delete/$1';
$route['page/privilege-type/save'] = 'admin/privilegeType/save';
$route['page/privilege-type/remove/(:num)'] = 'admin/privilegeType/remove/$1';
$route['page/privilege-type/validate/(:any)/(:any)'] = 'admin/privilegeType/validate/$1/$2';

$route['page/province'] = 'admin/province';
$route['page/province/index'] = 'admin/province/index/$1';
$route['page/province/index/(:num)'] = 'admin/province/index/$1';
$route['page/province/create'] = 'admin/province/create';
$route['page/province/edit/(:num)'] = 'admin/province/edit/$1';
$route['page/province/delete/(:num)'] = 'admin/province/delete/$1';
$route['page/province/save'] = 'admin/province/save';
$route['page/province/remove/(:num)'] = 'admin/province/remove/$1';
$route['page/province/validate/(:any)/(:any)'] = 'admin/province/validate/$1/$2';

$route['page/role'] = 'admin/role';
$route['page/role/index'] = 'admin/role/index/$1';
$route['page/role/index/(:num)'] = 'admin/role/index/$1';
$route['page/role/create'] = 'admin/role/create';
$route['page/role/edit/(:num)'] = 'admin/role/edit/$1';
$route['page/role/delete/(:num)'] = 'admin/role/delete/$1';
$route['page/role/save'] = 'admin/role/save';
$route['page/role/remove/(:num)'] = 'admin/role/remove/$1';
$route['page/role/validate/(:any)/(:any)'] = 'admin/role/validate/$1/$2';

$route['page/security-profile'] = 'admin/securityProfile';
$route['page/security-profile/index'] = 'admin/securityProfile/index/$1';
$route['page/security-profile/index/(:num)'] = 'admin/securityProfile/index/$1';
$route['page/security-profile/create'] = 'admin/securityProfile/create';
$route['page/security-profile/edit/(:num)'] = 'admin/securityProfile/edit/$1';
$route['page/security-profile/delete/(:num)'] = 'admin/securityProfile/delete/$1';
$route['page/security-profile/save'] = 'admin/securityProfile/save';
$route['page/security-profile/remove/(:num)'] = 'admin/securityProfile/remove/$1';
$route['page/security-profile/validate/(:any)/(:any)'] = 'admin/securityProfile/validate/$1/$2';

$route['page/status'] = 'admin/status';
$route['page/status/index'] = 'admin/status/index/$1';
$route['page/status/index/(:num)'] = 'admin/status/index/$1';
$route['page/status/create'] = 'admin/status/create';
$route['page/status/edit/(:num)'] = 'admin/status/edit/$1';
$route['page/status/delete/(:num)'] = 'admin/status/delete/$1';
$route['page/status/save'] = 'admin/status/save';
$route['page/status/remove/(:num)'] = 'admin/status/remove/$1';
$route['page/status/validate/(:any)/(:any)'] = 'admin/status/validate/$1/$2';

$route['page/time'] = 'admin/time';
$route['page/time/index'] = 'admin/time/index/$1';
$route['page/time/index/(:num)'] = 'admin/time/index/$1';
$route['page/time/create'] = 'admin/time/create';
$route['page/time/edit/(:num)'] = 'admin/time/edit/$1';
$route['page/time/delete/(:num)'] = 'admin/time/delete/$1';
$route['page/time/save'] = 'admin/time/save';
$route['page/time/remove/(:num)'] = 'admin/time/remove/$1';
$route['page/time/validate/(:any)/(:any)'] = 'admin/time/validate/$1/$2';

$route['page/title'] = 'admin/title';
$route['page/title/index'] = 'admin/title/index/$1';
$route['page/title/index/(:num)'] = 'admin/title/index/$1';
$route['page/title/create'] = 'admin/title/create';
$route['page/title/edit/(:num)'] = 'admin/title/edit/$1';
$route['page/title/delete/(:num)'] = 'admin/title/delete/$1';
$route['page/title/save'] = 'admin/title/save';
$route['page/title/remove/(:num)'] = 'admin/title/remove/$1';
$route['page/title/validate/(:any)/(:any)'] = 'admin/title/validate/$1/$2';

$route['page/user'] = 'admin/user';
$route['page/user/index'] = 'admin/user/index/$1';
$route['page/user/index/(:num)'] = 'admin/user/index/$1';
$route['page/user/create'] = 'admin/user/create';
$route['page/user/edit/(:num)'] = 'admin/user/edit/$1';
$route['page/user/delete/(:num)'] = 'admin/user/delete/$1';
$route['page/user/save'] = 'admin/user/save';
$route['page/user/remove/(:num)'] = 'admin/user/remove/$1';
$route['page/user/validate/(:any)/(:any)'] = 'admin/user/validate/$1/$2';

$route['page/search-personal-list'] = 'admin/personSearch';
$route['page/search-personal-list/index'] = 'admin/personSearch/index/$1';
$route['page/search-personal-list/index/(:num)'] = 'admin/personSearch/index/$1';

$route['page/person'] = 'admin/person';
$route['page/person/index'] = 'admin/person/index/$1';
$route['page/person/index/(:num)'] = 'admin/person/index/$1';
$route['page/person/create'] = 'admin/person/create';
$route['page/person/edit/(:num)'] = 'admin/person/edit/$1';
$route['page/person/delete/(:num)'] = 'admin/person/delete/$1';
$route['page/person/save'] = 'admin/person/save';
$route['page/person/remove/(:num)'] = 'admin/person/remove/$1';
$route['page/person/validate/(:any)/(:any)'] = 'admin/person/validate/$1/$2';

$route['page/personal-list-detail'] = 'admin/personalListDetail';
$route['page/personal-list-detail/index'] = 'admin/personalListDetail/index/$1';
$route['page/personal-list-detail/index/(:num)'] = 'admin/personalListDetail/index/$1';
$route['page/personal-list-detail/create'] = 'admin/personalListDetail/create';
$route['page/personal-list-detail/edit/(:num)'] = 'admin/personalListDetail/edit/$1';
$route['page/personal-list-detail/delete/(:num)'] = 'admin/personalListDetail/delete/$1';
$route['page/personal-list-detail/save'] = 'admin/personalListDetail/save';
$route['page/personal-list-detail/remove/(:num)'] = 'admin/personalListDetail/remove/$1';
$route['page/personal-list-detail/validate/(:any)/(:any)'] = 'admin/personalListDetail/validate/$1/$2';

$route['page/upload-personal-list'] = 'admin/uploadFiles/persons';


// $route['api/v1/users']['get'] = 'user';
