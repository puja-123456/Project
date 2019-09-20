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
$route['default_controller'] = 'crest';
$route['crest'] = 'crest';
$route['umo'] = 'crest/category_page';
$route['ugko'] = 'crest/category_page';
$route['ufo'] = 'crest/category_page';
$route['uro'] = 'crest/category_page';
$route['uso'] = 'crest/category_page';
$route['ueo'] = 'crest/category_page';
$route['uco'] = 'crest/category_page';

$route['already_paid']= 'crest/already_paid';
$route['pre-registration'] = 'crest/chk_reg';
$route['registration'] = 'crest/reg_form';
$route['pay/(:any)'] = 'crest/payment/$1';
$route['payment_success'] = 'crest/payment_success';
$route['payment_cancel'] = 'crest/payment_cancel';
$route['u(:any)/syllabus'] = 'crest/syllabus_pages';
$route['syllabus'] = 'crest/syllabuss_pages';
$route['u(:any)/syllabus-class-(:num)'] = 'crest/syllabus_class_pages';
// $route['class-(:num)'] = 'crest/all_pages';
$route['u(:any)-sample-papers'] = 'crest/sample_papers';
//$route['sample-questions-(:num)'] = 'crest/sample_questions';
$route['u(:any)-sample-papers-class-(:num)'] = 'crest/sample_questions';

$route['c(:any)o-examples'] = 'breaktime/sample_questions';
$route['ceo-class-(:num)-example-(:num)'] = 'breaktime/sample_questions';
$route['cmo-class-(:num)-example-(:num)'] = 'breaktime/sample_questions';
$route['cso-class-(:num)-example-(:num)'] = 'breaktime/sample_questions';
$route['cco-class-(:num)-example-(:num)'] = 'breaktime/sample_questions';
$route['cro-class-(:num)-example-(:num)'] = 'breaktime/sample_questions';
$route['cgko-class-(:num)-example-(:num)'] = 'breaktime/sample_questions';


$route['exam-schedule'] = 'crest/cms_page';
$route['u(:any)/marking-scheme'] = 'crest/cms_page';
$route['marking-scheme'] = 'crest/cmss_page';
$route['cut-off-and-rankings'] = 'crest/cms_page';
$route['awards'] = 'crest/cms_page';
$route['sample-papers'] = 'crest/cms_page';
$route['terms-of-use'] = 'crest/cms_page';
$route['privacy-policy'] = 'crest/cms_page';

$route['co-ordinator'] = 'crest/coordinator';
$route['contact-us'] = 'crest/contact';
$route['downloads'] = 'crest/downloads';
$route['faqs'] = 'crest/faqs';
$route['about-us'] = 'crest/about';

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

$route['brain-yoga'] = 'crest/brain_yoga';
$route['brain-yoga/(:any)'] = "crest/brain_yoga";

$route['blog'] = "blog/articles";
$route['blog/(:any)'] = "blog/articles";

$route['schools'] = "school_reg/school_list";
$route['schools/(:any)'] = "school_reg/articles";

$route['cro-rankers'] = "crest/cro_rankers";
$route['cro-cutoff'] = "crest/cro_cutoff";



