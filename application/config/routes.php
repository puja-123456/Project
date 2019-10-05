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
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
// $route['default_controller'] = 'landing';
$route['default_controller'] = 'unicus';
$route['crest'] = 'unicus';
$route['umo'] = 'unicus/category_page';
$route['ugko'] = 'unicus/category_page';
$route['ucto'] = 'unicus/category_page';
/*$route['uro'] = 'unicus/category_page';*/
$route['uso'] = 'unicus/category_page';
$route['ueo'] = 'unicus/category_page';
$route['uco'] = 'unicus/category_page';

$route['already_paid']= 'unicus/already_paid';
$route['pre-registration'] = 'unicus/chk_reg';
$route['registration'] = 'unicus/reg_form';
$route['pay/(:any)'] = 'unicus/payment/$1';
$route['payment_success'] = 'unicus/payment_success';
$route['payment_cancel'] = 'unicus/payment_cancel';
$route['u(:any)/syllabus'] = 'unicus/syllabus_pages';
$route['syllabus'] = 'unicus/syllabuss_pages';
$route['u(:any)/syllabus-class-(:num)'] = 'unicus/syllabus_class_pages';
// $route['class-(:num)'] = 'crest/all_pages';
$route['u(:any)/sample-papers'] = 'unicus/sample_papers';
//$route['sample-questions-(:num)'] = 'crest/sample_questions';
$route['u(:any)/sample-papers-class-(:num)'] = 'unicus/sample_questions';

$route['c(:any)o-examples'] = 'breaktime/sample_questions';
$route['ceo-class-(:num)-example-(:num)'] = 'breaktime/sample_questions';
$route['cmo-class-(:num)-example-(:num)'] = 'breaktime/sample_questions';
$route['cso-class-(:num)-example-(:num)'] = 'breaktime/sample_questions';
$route['cco-class-(:num)-example-(:num)'] = 'breaktime/sample_questions';
$route['cro-class-(:num)-example-(:num)'] = 'breaktime/sample_questions';
$route['cgko-class-(:num)-example-(:num)'] = 'breaktime/sample_questions';


$route['exam-dates'] = 'unicus/cms_page';
$route['u(:any)/marking-scheme'] = 'unicus/cms_page';
$route['marking-scheme'] = 'unicus/cmss_page';
$route['u(:any)/cut-off-and-rankings'] = 'unicus/cms_page';
$route['cut-off-and-rankings'] = 'unicus/cms_cut_off';
$route['awards'] = 'unicus/cms_page';
$route['sample-papers'] = 'unicus/cms_page';
$route['terms-of-use'] = 'unicus/cms_page';
$route['privacy-policy'] = 'unicus/cms_page';
$route['user/instructions/(:any)'] = 'user/instructions';


$route['co-ordinator'] = 'unicus/coordinator';
$route['contact-us'] = 'unicus/contact';
$route['downloads'] = 'unicus/downloads';
$route['faqs'] = 'unicus/faqs';
$route['about-us'] = 'unicus/about';

$route['register-school'] = 'school_reg/register';

$route['admin'] = 'admin';
$route['login'] = "auth/login";
$route['forgot-password'] = "auth/forgot_password";
//$route['admin'] = 'admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['daily-quiz'] = "daily_quiz/index";
$route['daily-quiz/start'] = "daily_quiz/start";
$route['daily-quiz/start/(:any)'] = "daily_quiz/get_questions/$1";

$route['olympiad-exam'] = 'auth/olympiad_login';


$route['brain-yoga'] = 'unicus/brain_yoga';
$route['brain-yoga/(:any)'] = "unicus/brain_yoga";

$route['blog'] = "blog/articles";
$route['blog/(:any)'] = "blog/articles";

$route['schools'] = "school_reg/school_list";
$route['schools/(:any)'] = "school_reg/articles";

$route['cro-rankers'] = "unicus/cro_rankers";
$route['cro-cutoff'] = "unicus/cro_cutoff";



