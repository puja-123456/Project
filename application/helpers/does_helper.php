<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



/****** Send Email ******/

function sendEmail($from = null, $to = null, $sub = null, $msg = null, $cc = null, $bcc = null, $attachment = null)
{

	if(!filter_var($from, FILTER_VALIDATE_EMAIL) || !filter_var($to, FILTER_VALIDATE_EMAIL)) {
		return false;
	}
	$CI =& get_instance();

	/**sendEmail through Webmail settings **/
	if($msg != "") {

		$CI->load->library('email');
		$CI->email->clear();
		$config = Array(
					'protocol' 	=> 'smtp',
					'smtp_host' => $CI->config->item('emailSettings')->smtp_host,
					'smtp_port' => $CI->config->item('emailSettings')->smtp_port,
					'smtp_user' => $CI->config->item('emailSettings')->smtp_user,
					'smtp_pass' => $CI->config->item('emailSettings')->smtp_pass,
					'charset' 	=> 'utf-8',
					'mailtype' 	=> 'html',
					'newline' 	=> "\r\n",
					'wordwrap' 	=> TRUE
				);

		if($CI->config->item('emailSettings')->mail_config == "webmail"){

			$CI->email->initialize($config);

			$CI->email->from($CI->config->item('emailSettings')->smtp_user, $CI->config->item('site_settings')->site_title);

			$CI->email->to($to);

			if($cc != "" && filter_var($cc, FILTER_VALIDATE_EMAIL))
				$CI->email->cc($cc);
			if($bcc != "" && filter_var($bcc, FILTER_VALIDATE_EMAIL))
				$CI->email->bcc($bcc);

			if($attachment != "")
				$CI->email->attach($attachment);

			$CI->email->subject($sub);
			$CI->email->message($msg);

			if( $CI->email->send() )
				return true;

		} else { /*sendEmail through mandrill**/

			$CI->load->config('mandrill');

			$CI->load->library('mandrill');

			$mandrill_ready = NULL;

			try {
				$CI->mandrill->init($CI->config->item('mandrill_api_key'));
				$mandrill_ready = TRUE;
			} catch(Mandrill_Exception $e) {
				$mandrill_ready = FALSE;
			}

			if( $mandrill_ready ) {

				//Send us some email!
				$email = array(
					'html' => $msg, //Consider using a view file
					'text' => '',
					'subject' => $sub,
					'from_email' => $from,
					'from_name' => $CI->config->item('site_settings')->site_title,
					'to' => array(array('email' => $to )) 
					);

					$result = $CI->mandrill->messages_send($email);

					if($result[0]['status']=='sent')
					return TRUE;
					else
					return FALSE;
			}
		}
	}
	return false;
}


if ( ! function_exists('cleanString'))
{
	function cleanString($str) {

	$clean = preg_replace ('/[^\p{L}\p{N}]/u', '-', $str);

	return $clean;
}
}


 
 
 