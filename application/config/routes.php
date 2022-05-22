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

$route['page/auth'] = 'auth';
$route['page/authorization'] = 'login/authorization';
$route['page/not-authorize'] = 'login/notAuthorized';

$route['page/allegation-type'] = 'admin/foundation/allegationType';
$route['page/allegation-type/index'] = 'admin/foundation/allegationType/index/$1';
$route['page/allegation-type/index/(:num)'] = 'admin/foundation/allegationType/index/$1';
$route['page/allegation-type/create'] = 'admin/foundation/allegationType/create';
$route['page/allegation-type/edit/(:num)'] = 'admin/foundation/allegationType/edit/$1';
$route['page/allegation-type/delete/(:num)'] = 'admin/foundation/allegationType/delete/$1';
$route['page/allegation-type/save'] = 'admin/foundation/allegationType/save';
$route['page/allegation-type/remove/(:num)'] = 'admin/foundation/allegationType/remove/$1';
$route['page/allegation-type/validate/(:any)/(:any)'] = 'admin/foundation/allegationType/validate/$1/$2';

$route['page/branch'] = 'admin/foundation/branch';
$route['page/branch/index'] = 'admin/foundation/branch/index/$1';
$route['page/branch/index/(:num)'] = 'admin/foundation/branch/index/$1';
$route['page/branch/create'] = 'admin/foundation/branch/create';
$route['page/branch/edit/(:num)'] = 'admin/foundation/branch/edit/$1';
$route['page/branch/delete/(:num)'] = 'admin/foundation/branch/delete/$1';
$route['page/branch/save'] = 'admin/foundation/branch/save';
$route['page/branch/remove/(:num)'] = 'admin/foundation/branch/remove/$1';
$route['page/branch/validate/(:any)/(:any)/(:any)'] = 'admin/foundation/branch/validate/$1/$2/$3';

$route['page/business-unit'] = 'admin/foundation/businessUnit';
$route['page/business-unit/index'] = 'admin/foundation/businessUnit/index/$1';
$route['page/business-unit/index/(:num)'] = 'admin/foundation/businessUnit/index/$1';
$route['page/business-unit/create'] = 'admin/foundation/businessUnit/create';
$route['page/business-unit/edit/(:num)'] = 'admin/foundation/businessUnit/edit/$1';
$route['page/business-unit/delete/(:num)'] = 'admin/foundation/businessUnit/delete/$1';
$route['page/business-unit/save'] = 'admin/foundation/businessUnit/save';
$route['page/business-unit/remove/(:num)'] = 'admin/foundation/businessUnit/remove/$1';
$route['page/business-unit/validate/(:any)/(:any)'] = 'admin/foundation/businessUnit/validate/$1/$2';

$route['page/company'] = 'admin/foundation/company';
$route['page/company/index'] = 'admin/foundation/company/index/$1';
$route['page/company/index/(:num)'] = 'admin/foundation/company/index/$1';
$route['page/company/create'] = 'admin/foundation/company/create';
$route['page/company/edit/(:num)'] = 'admin/foundation/company/edit/$1';
$route['page/company/delete/(:num)'] = 'admin/foundation/company/delete/$1';
$route['page/company/save'] = 'admin/foundation/company/save';
$route['page/company/remove/(:num)'] = 'admin/foundation/company/remove/$1';
$route['page/company/validate/(:any)/(:any)'] = 'admin/foundation/company/validate/$1/$2';

$route['page/country'] = 'admin/foundation/country';
$route['page/country/index'] = 'admin/foundation/country/index/$1';
$route['page/country/index/(:num)'] = 'admin/foundation/country/index/$1';
$route['page/country/create'] = 'admin/foundation/country/create';
$route['page/country/edit/(:num)'] = 'admin/foundation/country/edit/$1';
$route['page/country/delete/(:num)'] = 'admin/foundation/country/delete/$1';
$route['page/country/save'] = 'admin/foundation/country/save';
$route['page/country/remove/(:num)'] = 'admin/foundation/country/remove/$1';
$route['page/country/validate/(:any)/(:any)'] = 'admin/foundation/country/validate/$1/$2';

$route['page/data-source'] = 'admin/foundation/dataSource';
$route['page/data-source/index'] = 'admin/foundation/dataSource/index/$1';
$route['page/data-source/index/(:num)'] = 'admin/foundation/dataSource/index/$1';
$route['page/data-source/create'] = 'admin/foundation/dataSource/create';
$route['page/data-source/edit/(:num)'] = 'admin/foundation/dataSource/edit/$1';
$route['page/data-source/delete/(:num)'] = 'admin/foundation/dataSource/delete/$1';
$route['page/data-source/save'] = 'admin/foundation/dataSource/save';
$route['page/data-source/remove/(:num)'] = 'admin/foundation/dataSource/remove/$1';
$route['page/data-source/validate/(:any)/(:any)'] = 'admin/foundation/dataSource/validate/$1/$2';

$route['page/district'] = 'admin/foundation/district';
$route['page/district/index'] = 'admin/foundation/district/index/$1';
$route['page/district/index/(:num)'] = 'admin/foundation/district/index/$1';
$route['page/district/create'] = 'admin/foundation/district/create';
$route['page/district/edit/(:num)'] = 'admin/foundation/district/edit/$1';
$route['page/district/delete/(:num)'] = 'admin/foundation/district/delete/$1';
$route['page/district/save'] = 'admin/foundation/district/save';
$route['page/district/remove/(:num)'] = 'admin/foundation/district/remove/$1';
$route['page/district/validate/(:any)/(:any)'] = 'admin/foundation/district/validate/$1/$2';

$route['page/group-company'] = 'admin/foundation/groupCompany';
$route['page/group-company/index'] = 'admin/foundation/groupCompany/index/$1';
$route['page/group-company/index/(:num)'] = 'admin/foundation/groupCompany/index/$1';
$route['page/group-company/create'] = 'admin/foundation/groupCompany/create';
$route['page/group-company/edit/(:num)'] = 'admin/foundation/groupCompany/edit/$1';
$route['page/group-company/delete/(:num)'] = 'admin/foundation/groupCompany/delete/$1';
$route['page/group-company/save'] = 'admin/foundation/groupCompany/save';
$route['page/group-company/remove/(:num)'] = 'admin/foundation/groupCompany/remove/$1';
$route['page/group-company/validate/(:any)/(:any)'] = 'admin/foundation/groupCompany/validate/$1/$2';

$route['page/person-type'] = 'admin/foundation/personType';
$route['page/person-type/index'] = 'admin/foundation/personType/index/$1';
$route['page/person-type/index/(:num)'] = 'admin/foundation/personType/index/$1';
$route['page/person-type/create'] = 'admin/foundation/personType/create';
$route['page/person-type/edit/(:num)'] = 'admin/foundation/personType/edit/$1';
$route['page/person-type/delete/(:num)'] = 'admin/foundation/personType/delete/$1';
$route['page/person-type/save'] = 'admin/foundation/personType/save';
$route['page/person-type/remove/(:num)'] = 'admin/foundation/personType/remove/$1';
$route['page/person-type/validate/(:any)/(:any)'] = 'admin/foundation/personType/validate/$1/$2';

$route['page/privilege-type'] = 'admin/foundation/privilegeType';
$route['page/privilege-type/index'] = 'admin/foundation/privilegeType/index/$1';
$route['page/privilege-type/index/(:num)'] = 'admin/foundation/privilegeType/index/$1';
$route['page/privilege-type/create'] = 'admin/foundation/privilegeType/create';
$route['page/privilege-type/edit/(:num)'] = 'admin/foundation/privilegeType/edit/$1';
$route['page/privilege-type/delete/(:num)'] = 'admin/foundation/privilegeType/delete/$1';
$route['page/privilege-type/save'] = 'admin/foundation/privilegeType/save';
$route['page/privilege-type/remove/(:num)'] = 'admin/foundation/privilegeType/remove/$1';
$route['page/privilege-type/validate/(:any)/(:any)'] = 'admin/foundation/privilegeType/validate/$1/$2';

$route['page/province'] = 'admin/foundation/province';
$route['page/province/index'] = 'admin/foundation/province/index/$1';
$route['page/province/index/(:num)'] = 'admin/foundation/province/index/$1';
$route['page/province/create'] = 'admin/foundation/province/create';
$route['page/province/edit/(:num)'] = 'admin/foundation/province/edit/$1';
$route['page/province/delete/(:num)'] = 'admin/foundation/province/delete/$1';
$route['page/province/save'] = 'admin/foundation/province/save';
$route['page/province/remove/(:num)'] = 'admin/foundation/province/remove/$1';
$route['page/province/validate/(:any)/(:any)'] = 'admin/foundation/province/validate/$1/$2';

$route['page/status'] = 'admin/foundation/status';
$route['page/status/index'] = 'admin/foundation/status/index/$1';
$route['page/status/index/(:num)'] = 'admin/foundation/status/index/$1';
$route['page/status/create'] = 'admin/foundation/status/create';
$route['page/status/edit/(:num)'] = 'admin/foundation/status/edit/$1';
$route['page/status/delete/(:num)'] = 'admin/foundation/status/delete/$1';
$route['page/status/save'] = 'admin/foundation/status/save';
$route['page/status/remove/(:num)'] = 'admin/foundation/status/remove/$1';
$route['page/status/validate/(:any)/(:any)'] = 'admin/foundation/status/validate/$1/$2';

$route['page/time'] = 'admin/foundation/time';
$route['page/time/index'] = 'admin/foundation/time/index/$1';
$route['page/time/index/(:num)'] = 'admin/foundation/time/index/$1';
$route['page/time/create'] = 'admin/foundation/time/create';
$route['page/time/edit/(:num)'] = 'admin/foundation/time/edit/$1';
$route['page/time/delete/(:num)'] = 'admin/foundation/time/delete/$1';
$route['page/time/save'] = 'admin/foundation/time/save';
$route['page/time/remove/(:num)'] = 'admin/foundation/time/remove/$1';
$route['page/time/validate/(:any)/(:any)'] = 'admin/foundation/time/validate/$1/$2';

$route['page/title'] = 'admin/foundation/title';
$route['page/title/index'] = 'admin/foundation/title/index/$1';
$route['page/title/index/(:num)'] = 'admin/foundation/title/index/$1';
$route['page/title/create'] = 'admin/foundation/title/create';
$route['page/title/edit/(:num)'] = 'admin/foundation/title/edit/$1';
$route['page/title/delete/(:num)'] = 'admin/foundation/title/delete/$1';
$route['page/title/save'] = 'admin/foundation/title/save';
$route['page/title/remove/(:num)'] = 'admin/foundation/title/remove/$1';
$route['page/title/validate/(:any)/(:any)'] = 'admin/foundation/title/validate/$1/$2';

$route['page/user'] = 'admin/permission/user';
$route['page/user/index'] = 'admin/permission/user/index/$1';
$route['page/user/index/(:num)'] = 'admin/permission/user/index/$1';
$route['page/user/create'] = 'admin/permission/user/create';
$route['page/user/edit/(:num)'] = 'admin/permission/user/edit/$1';
$route['page/user/delete/(:num)'] = 'admin/permission/user/delete/$1';
$route['page/user/save'] = 'admin/permission/user/save';
$route['page/user/remove/(:num)'] = 'admin/permission/user/remove/$1';
$route['page/user/validate/(:any)/(:any)'] = 'admin/permission/user/validate/$1/$2';


$route['page/role'] = 'admin/permission/role';
$route['page/role/index'] = 'admin/permission/role/index/$1';
$route['page/role/index/(:num)'] = 'admin/permission/role/index/$1';
$route['page/role/create'] = 'admin/permission/role/create';
$route['page/role/edit/(:num)'] = 'admin/permission/role/edit/$1';
$route['page/role/delete/(:num)'] = 'admin/permission/role/delete/$1';
$route['page/role/save'] = 'admin/permission/role/save';
$route['page/role/remove/(:num)'] = 'admin/permission/role/remove/$1';
$route['page/role/validate/(:any)/(:any)'] = 'admin/permission/role/validate/$1/$2';

$route['page/security-profile'] = 'admin/permission/securityProfile';
$route['page/security-profile/index'] = 'admin/permission/securityProfile/index/$1';
$route['page/security-profile/index/(:num)'] = 'admin/permission/securityProfile/index/$1';
$route['page/security-profile/create'] = 'admin/permission/securityProfile/create';
$route['page/security-profile/edit/(:num)'] = 'admin/permission/securityProfile/edit/$1';
$route['page/security-profile/delete/(:num)'] = 'admin/permission/securityProfile/delete/$1';
$route['page/security-profile/save'] = 'admin/permission/securityProfile/save';
$route['page/security-profile/remove/(:num)'] = 'admin/permission/securityProfile/remove/$1';
$route['page/security-profile/validate/(:any)/(:any)'] = 'admin/permission/securityProfile/validate/$1/$2';

$route['page/person/search'] = 'admin/person/personSearch';
$route['page/person/search/index'] = 'admin/person/personSearch/index/$1';
$route['page/person/search/index/(:num)'] = 'admin/person/personSearch/index/$1';

$route['page/person'] = 'admin/person/person';
$route['page/person/index'] = 'admin/person/person/index/$1';
$route['page/person/index/(:num)'] = 'admin/person/person/index/$1';
$route['page/person/create'] = 'admin/person/person/create';
$route['page/person/edit/(:num)'] = 'admin/person/person/edit/$1';
$route['page/person/delete/(:num)'] = 'admin/person/person/delete/$1';
$route['page/person/save'] = 'admin/person/person/save';
$route['page/person/remove/(:num)'] = 'admin/person/person/remove/$1';
$route['page/person/validate/(:any)/(:any)'] = 'admin/person/person/validate/$1/$2';

$route['page/personal-list-detail'] = 'admin/person/personalListDetail';
$route['page/personal-list-detail/index'] = 'admin/person/personalListDetail/index/$1';
$route['page/personal-list-detail/index/(:num)'] = 'admin/person/personalListDetail/index/$1';
$route['page/personal-list-detail/create'] = 'admin/person/personalListDetail/create';
$route['page/personal-list-detail/edit/(:num)'] = 'admin/person/personalListDetail/edit/$1';
$route['page/personal-list-detail/delete/(:num)'] = 'admin/person/personalListDetail/delete/$1';
$route['page/personal-list-detail/save'] = 'admin/person/personalListDetail/save';
$route['page/personal-list-detail/remove/(:num)'] = 'admin/person/personalListDetail/remove/$1';
$route['page/personal-list-detail/validate/(:any)/(:any)'] = 'admin/person/personalListDetail/validate/$1/$2';

$route['page/person/upload'] = 'admin/person/personUploadFile';
$route['page/person/upload/upload'] = 'admin/person/personUploadFile/upload';
$route['page/person/upload/download'] = 'admin/person/personUploadFile/download';


$route['page/report/blacklist'] = 'admin/report/blacklistReport';
$route['page/report/blacklist/export'] = 'admin/report/blacklistReport/download';
$route['page/report/summary'] = 'admin/report/BlacklistSummaryReport';
$route['page/report/summary/export'] = 'admin/report/blacklistSummaryReport/download';


// ajax
$route["page/business-unit/ajax/(:any)"] = "admin/foundation/businessUnit/ajax/$1";
$route["page/company/ajax/(:any)"] = "admin/foundation/company/ajax/$1";
$route["page/branch/ajax/(:any)"] = "admin/foundation/branch/ajax/$1";
$route["page/allegation-type/ajax/(:any)"] = "admin/foundation/allegationType/ajax/$1";

// $route['api/v1/users']['get'] = 'user';
