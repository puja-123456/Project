<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function calculate_median($arr) {
$count = count($arr); //total numbers in array
$middleval = floor(($count-1)/2); // find the middle value, or the lowest middle value
if($count % 2) { // odd number, middle is the median
	$median = $arr[$middleval];
} else { // even number, calculate avg of 2 medians
	$low = $arr[$middleval];
	$high = $arr[$middleval+1];
	$median = (($low+$high)/2);
}
return $median;
}
function randomPassword() {
	$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
$pass = array(); //remember to declare $pass as an array
$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
for ($i = 0; $i < 8; $i++) {
	$n = rand(0, $alphaLength);
	$pass[] = $alphabet[$n];
}
return implode($pass); //turn the array into a string
}
function quizTimeTaken($test_start_time, $test_finish_time){
    $timetaken =  $test_finish_time - $test_start_time; 
    return $timetaken;
}

function quizAttemptTime($quiz_time, $time_left_at_quiz_end_min, $time_left_at_quiz_end_sec) {
	$quiz_min     = $quiz_time - 1;
	$quiz_seconds  = 60;

	$mins_left   = $quiz_min - $time_left_at_quiz_end_min;
	$seconds_left = $quiz_seconds - $time_left_at_quiz_end_sec;

	return $mins_left .":".$seconds_left;
}
function cleanCommaSeperatedString($str) {
	return rtrim($str,",");
}
function cleanFileName($string) {
	$string = strtolower($string);
$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
$string =  preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
$string = str_replace('\'', '', $string);
$string = str_replace('&', '_', $string);
$string = str_replace('.', '_', $string);
$string = str_replace('(', '_', $string);
$string = str_replace(')', '_', $string);
$string = str_replace('/', '_', $string);
$string = str_replace('?', '_', $string);
$string = str_replace(' ', '_', $string);
$string = str_replace(' ', '||', $string);
$string = str_replace('!', '', $string);
return $string;
}
function generateCaptcha() {
//  $this->load->helper('captcha');

	$ci = &get_instance();
	$ci->load->helper('captcha');

	$random_number = substr(number_format(time() * rand(),0,'',''),0,6);
	$vals = array(
		'word' => $random_number,
		'img_path' => './assets/captcha/',
		'img_url' => base_url().'assets/captcha/',
		'img_width' => 140,
		'img_height' => 32,
		'expiration' => 7200
	);
	return create_captcha($vals);
}
function htmlText($html) {
// $html = '<||| '.$html.' |||>';

	$html   =  str_replace('<|||', '<', $html);
	$html   =  str_replace('|||>', '>', $html);
	return $html;
}
?>