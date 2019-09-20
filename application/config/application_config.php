<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

//mailing info
$config['site_name']	= 'CREST Olympiads';
//$config['smtp_host']	= 'smtp.gmail.com';
$config['smtp_host']	= 'ssl://smtp.googlemail.com';

/*$config['smtp_user']	= 'smartexam4u@gmail.com';
$config['smtp_pass']	= 'prabhakar@123'; */
$config['smtp_user']	= 'crestolympiads@gmail.com';
$config['smtp_pass']	= 'Crest@123$';
$config['smtp_port']	= '465';

$config['contact_email'] = 'info@crestolympiads.com';
$config['support_mails_fwd'] = 'info@crestolympiads.com';
$config['school_mails_fwd'] = 'info@crestolympiads.com,prachi@crestolympiads.com';
//$config['school_mails_fwd'] .= 'anshul@crestolympiads.com';
$config['coord_mail_fwd'] = 'arti@crestolympiads.com';
$config['ng_email'] = 'nitin.godawat@gmail.com';

$config['facebook_api_key'] = '420034855149688';

$config['main_site_link'] 	= 'https://www.olympiadsuccess.com/';
$config['image_site_link'] 	= 'https://www.olympiadsuccess.com/';
$config['support_phone'] 	= '+91-9818-294-134';
//social links
$config['facebook_link'] = 'https://www.facebook.com/crestolympiads/';
$config['linkedin_link'] = 'https://www.linkedin.com/company/crestolympiads/';
$config['twitter_link'] = 'https://twitter.com/crestolympiads';
$config['g_plus_link'] = '';
$config['instagram_link'] = 'https://www.instagram.com/crestolympiads/';
$config['pinterest_link'] = 'https://in.pinterest.com/crestolympiads/';
$config['youtube_link'] = '';


$config['main_categories'] = array('1'=> array('umo','UMO','Unicus Mathematics Olympiad','yellow lighten-1'),
									
									'2'=> array('uso','USO','Unicus Science Olympiad','yellow lighten-2'), 
									'3'=> array('ueo','UEO','Unicus English Olympiad','yellow darken-1'),
									// '5'=> array('cgko','CGKO','CREST General Knowledge Olympiad','amber'), 
									'4'=> array('ugko','UGKO','Unicus General Knowledge Olympiad','yellow darken-2'), 
									// '5'=> array('cfo','CFO','CREST French Olympiad','teal') 
									'5'=> array('uco','UCO','Unicus Cyber Olympiad','yellow darken-3'), 
									'6'=> array('ucto','UCTO','Unicus Critical Thinking Olympiad','yellow darken-4') 
								);


$config['main_examdates'] = array('1'=> array('umo','UMO','24 Sep','yellow lighten-1'),
									
									'2'=> array('uso','USO','30 Sep','yellow lighten-2'), 
									'3'=> array('ueo','UEO','31 Sep','yellow darken-1'),
									// '5'=> array('cgko','CGKO','CREST General Knowledge Olympiad','amber'), 
									'4'=> array('ugko','UGKO','5 Oct','yellow darken-2'), 
									// '5'=> array('cfo','CFO','CREST French Olympiad','teal') 
									'5'=> array('uco','UCO','8 Oct','yellow darken-3'), 
									'6'=> array('ucto','UCTO','12 Oct','yellow darken-4') 
								);


$config['slider'] = 'slider_small_bottom';

// $config['backend_bgimage'] = 'http://www.olympiadsuccess.com/assets/designs/images/admin-bg.jpg';

$config['image_src_url'] = 'https://www.crestolympiads.com/assets/uploads/';

$config['backend_bgimage'] = 'https://www.crestolympiads.com/assets/images/admin-bg.jpg';

date_default_timezone_set('Asia/Kolkata');

?>