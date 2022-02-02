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
$route['page/home'] = 'common/dashboard';


$route['page/allegation-type'] = 'common/allegationType';
$route['page/allegation-type/index'] = 'common/allegationType/index/$1';
$route['page/allegation-type/index/(:num)'] = 'common/allegationType/index/$1';
$route['page/allegation-type'] = 'common/allegationType';
$route['page/allegation-type/create'] = 'common/allegationType/create';
$route['page/allegation-type/edit/(:num)'] = 'common/allegationType/edit/$1';
$route['page/allegation-type/delete/(:num)'] = 'common/allegationType/delete/$1';
$route['page/allegation-type/save'] = 'common/allegationType/save';
$route['page/allegation-type/remove/(:num)'] = 'common/allegationType/remove/$1';

$route['page/branch'] = 'common/branch';
$route['page/branch/index'] = 'common/branch/index/$1';
$route['page/branch/index/(:num)'] = 'common/branch/index/$1';
$route['page/branch'] = 'common/branch';
$route['page/branch/create'] = 'common/branch/create';
$route['page/branch/edit/(:num)'] = 'common/branch/edit/$1';
$route['page/branch/delete/(:num)'] = 'common/branch/delete/$1';
$route['page/branch/save'] = 'common/branch/save';
$route['page/branch/remove/(:num)'] = 'common/branch/remove/$1';

$route['page/business-unit'] = 'common/businessUnit';
$route['page/business-unit/index'] = 'common/businessUnit/index/$1';
$route['page/business-unit/index/(:num)'] = 'common/businessUnit/index/$1';
$route['page/business-unit'] = 'common/businessUnit';
$route['page/business-unit/create'] = 'common/businessUnit/create';
$route['page/business-unit/edit/(:num)'] = 'common/businessUnit/edit/$1';
$route['page/business-unit/delete/(:num)'] = 'common/businessUnit/delete/$1';
$route['page/business-unit/save'] = 'common/businessUnit/save';
$route['page/business-unit/remove/(:num)'] = 'common/businessUnit/remove/$1';

$route['page/company'] = 'common/company';
$route['page/company/index'] = 'common/company/index/$1';
$route['page/company/index/(:num)'] = 'common/company/index/$1';
$route['page/company'] = 'common/company';
$route['page/company/create'] = 'common/company/create';
$route['page/company/edit/(:num)'] = 'common/company/edit/$1';
$route['page/company/delete/(:num)'] = 'common/company/delete/$1';
$route['page/company/save'] = 'common/company/save';
$route['page/company/remove/(:num)'] = 'common/company/remove/$1';

$route['page/country'] = 'common/country';
$route['page/country/index'] = 'common/country/index/$1';
$route['page/country/index/(:num)'] = 'common/country/index/$1';
$route['page/country'] = 'common/country';
$route['page/country/create'] = 'common/country/create';
$route['page/country/edit/(:num)'] = 'common/country/edit/$1';
$route['page/country/delete/(:num)'] = 'common/country/delete/$1';
$route['page/country/save'] = 'common/country/save';
$route['page/country/remove/(:num)'] = 'common/country/remove/$1';

$route['page/data-source'] = 'common/dataSource';
$route['page/data-source/index'] = 'common/dataSource/index/$1';
$route['page/data-source/index/(:num)'] = 'common/dataSource/index/$1';
$route['page/data-source'] = 'common/dataSource';
$route['page/data-source/create'] = 'common/dataSource/create';
$route['page/data-source/edit/(:num)'] = 'common/dataSource/edit/$1';
$route['page/data-source/delete/(:num)'] = 'common/dataSource/delete/$1';
$route['page/data-source/save'] = 'common/dataSource/save';
$route['page/data-source/remove/(:num)'] = 'common/dataSource/remove/$1';

$route['page/district'] = 'common/district';
$route['page/district/index'] = 'common/district/index/$1';
$route['page/district/index/(:num)'] = 'common/district/index/$1';
$route['page/district'] = 'common/district';
$route['page/district/create'] = 'common/district/create';
$route['page/district/edit/(:num)'] = 'common/district/edit/$1';
$route['page/district/delete/(:num)'] = 'common/district/delete/$1';
$route['page/district/save'] = 'common/district/save';
$route['page/district/remove/(:num)'] = 'common/district/remove/$1';

$route['page/group-company'] = 'common/groupCompany';
$route['page/group-company/index'] = 'common/groupCompany/index/$1';
$route['page/group-company/index/(:num)'] = 'common/groupCompany/index/$1';
$route['page/group-company'] = 'common/groupCompany';
$route['page/group-company/create'] = 'common/groupCompany/create';
$route['page/group-company/edit/(:num)'] = 'common/groupCompany/edit/$1';
$route['page/group-company/delete/(:num)'] = 'common/groupCompany/delete/$1';
$route['page/group-company/save'] = 'common/groupCompany/save';
$route['page/group-company/remove/(:num)'] = 'common/groupCompany/remove/$1';

$route['page/person-type'] = 'common/personType';
$route['page/person-type/index'] = 'common/personType/index/$1';
$route['page/person-type/index/(:num)'] = 'common/personType/index/$1';
$route['page/person-type'] = 'common/personType';
$route['page/person-type/create'] = 'common/personType/create';
$route['page/person-type/edit/(:num)'] = 'common/personType/edit/$1';
$route['page/person-type/delete/(:num)'] = 'common/personType/delete/$1';
$route['page/person-type/save'] = 'common/personType/save';
$route['page/person-type/remove/(:num)'] = 'common/personType/remove/$1';

$route['page/privilege-type'] = 'common/privilegeType';
$route['page/privilege-type/index'] = 'common/privilegeType/index/$1';
$route['page/privilege-type/index/(:num)'] = 'common/privilegeType/index/$1';
$route['page/privilege-type'] = 'common/privilegeType';
$route['page/privilege-type/create'] = 'common/privilegeType/create';
$route['page/privilege-type/edit/(:num)'] = 'common/privilegeType/edit/$1';
$route['page/privilege-type/delete/(:num)'] = 'common/privilegeType/delete/$1';
$route['page/privilege-type/save'] = 'common/privilegeType/save';
$route['page/privilege-type/remove/(:num)'] = 'common/privilegeType/remove/$1';

$route['page/province'] = 'common/province';
$route['page/province/index'] = 'common/province/index/$1';
$route['page/province/index/(:num)'] = 'common/province/index/$1';
$route['page/province'] = 'common/province';
$route['page/province/create'] = 'common/province/create';
$route['page/province/edit/(:num)'] = 'common/province/edit/$1';
$route['page/province/delete/(:num)'] = 'common/province/delete/$1';
$route['page/province/save'] = 'common/province/save';
$route['page/province/remove/(:num)'] = 'common/province/remove/$1';

$route['page/role'] = 'common/role';
$route['page/role/index'] = 'common/role/index/$1';
$route['page/role/index/(:num)'] = 'common/role/index/$1';
$route['page/role'] = 'common/role';
$route['page/role/create'] = 'common/role/create';
$route['page/role/edit/(:num)'] = 'common/role/edit/$1';
$route['page/role/delete/(:num)'] = 'common/role/delete/$1';
$route['page/role/save'] = 'common/role/save';
$route['page/role/remove/(:num)'] = 'common/role/remove/$1';

$route['page/security-profile'] = 'common/securityProfile';
$route['page/security-profile/index'] = 'common/securityProfile/index/$1';
$route['page/security-profile/index/(:num)'] = 'common/securityProfile/index/$1';
$route['page/security-profile'] = 'common/securityProfile';
$route['page/security-profile/create'] = 'common/securityProfile/create';
$route['page/security-profile/edit/(:num)'] = 'common/securityProfile/edit/$1';
$route['page/security-profile/delete/(:num)'] = 'common/securityProfile/delete/$1';
$route['page/security-profile/save'] = 'common/securityProfile/save';
$route['page/security-profile/remove/(:num)'] = 'common/securityProfile/remove/$1';

$route['page/status'] = 'common/status';
$route['page/status/index'] = 'common/status/index/$1';
$route['page/status/index/(:num)'] = 'common/status/index/$1';
$route['page/status'] = 'common/status';
$route['page/status/create'] = 'common/status/create';
$route['page/status/edit/(:num)'] = 'common/status/edit/$1';
$route['page/status/delete/(:num)'] = 'common/status/delete/$1';
$route['page/status/save'] = 'common/status/save';
$route['page/status/remove/(:num)'] = 'common/status/remove/$1';

$route['page/time'] = 'common/time';
$route['page/time/index'] = 'common/time/index/$1';
$route['page/time/index/(:num)'] = 'common/time/index/$1';
$route['page/time'] = 'common/time';
$route['page/time/create'] = 'common/time/create';
$route['page/time/edit/(:num)'] = 'common/time/edit/$1';
$route['page/time/delete/(:num)'] = 'common/time/delete/$1';
$route['page/time/save'] = 'common/time/save';
$route['page/time/remove/(:num)'] = 'common/time/remove/$1';

$route['page/title'] = 'common/title';
$route['page/title/index'] = 'common/title/index/$1';
$route['page/title/index/(:num)'] = 'common/title/index/$1';
$route['page/title'] = 'common/title';
$route['page/title/create'] = 'common/title/create';
$route['page/title/edit/(:num)'] = 'common/title/edit/$1';
$route['page/title/delete/(:num)'] = 'common/title/delete/$1';
$route['page/title/save'] = 'common/title/save';
$route['page/title/remove/(:num)'] = 'common/title/remove/$1';

$route['page/user'] = 'common/user';
$route['page/user/index'] = 'common/user/index/$1';
$route['page/user/index/(:num)'] = 'common/user/index/$1';
$route['page/user'] = 'common/user';
$route['page/user/create'] = 'common/user/create';
$route['page/user/edit/(:num)'] = 'common/user/edit/$1';
$route['page/user/delete/(:num)'] = 'common/user/delete/$1';
$route['page/user/save'] = 'common/user/save';
$route['page/user/remove/(:num)'] = 'common/user/remove/$1';

$route['page/person'] = 'common/person';
$route['page/person/index'] = 'common/person/index/$1';
$route['page/person/index/(:num)'] = 'common/person/index/$1';
$route['page/person'] = 'common/person';
$route['page/person/create'] = 'common/person/create';
$route['page/person/edit/(:num)'] = 'common/person/edit/$1';
$route['page/person/delete/(:num)'] = 'common/person/delete/$1';
$route['page/person/save'] = 'common/person/save';
$route['page/person/remove/(:num)'] = 'common/person/remove/$1';

$route['page/personal-list-detail'] = 'common/personalListDetail';
$route['page/personal-list-detail/index'] = 'common/personalListDetail/index/$1';
$route['page/personal-list-detail/index/(:num)'] = 'common/personalListDetail/index/$1';
$route['page/personal-list-detail'] = 'common/personalListDetail';
$route['page/personal-list-detail/create'] = 'common/personalListDetail/create';
$route['page/personal-list-detail/edit/(:num)'] = 'common/personalListDetail/edit/$1';
$route['page/personal-list-detail/delete/(:num)'] = 'common/personalListDetail/delete/$1';
$route['page/personal-list-detail/save'] = 'common/personalListDetail/save';
$route['page/personal-list-detail/remove/(:num)'] = 'common/personalListDetail/remove/$1';



// $route['api/v1/users']['get'] = 'user';
