<?php
/**
 * CPPaste4
 *
 * Copyright (c) 2015 - 2020 Sindastra <https://github.com/sindastra>
 * All rights reserved.
 *
 * The above copyright notice and this notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * See LICENSE file for more info.
 *
 * @author Sindastra <https://github.com/sindastra>
 * @copyright (c) 2015 - 2020 Sindastra <https://github.com/sindastra>
 */

include('confighandler.php');

if(isset($_POST['code']) && isset($_POST['sb']))
	if(!empty(trim($_POST['code'])) && ($_POST['sb'] === ''))
		$code = gzcompress($_POST['code'], 9);
	else
		die('No (or incorrect) data received!');

if(!empty($conf['hCaptcha']['SiteKey']) && !empty($conf['hCaptcha']['SecretKey']))
{
	// Do not proceed if hCaptcha response is empty or missing!
	if(empty($_POST['h-captcha-response']))
		die('hCaptcha missing! Are you a bot?');

	// Assign return to variable and check if it's good. This is *not* a typo!
	if( !$hcaptchaResponse = filter_input(INPUT_POST, 'h-captcha-response', FILTER_SANITIZE_STRING) )
		die("Invalid hCaptcha response!");

	// Now that we know the response exists and is sanitized, let's work with it!
	// Let's verify with hCaptcha if things are ok:
	$hcaptchaCallingHome = file_get_contents('https://hcaptcha.com/siteverify?secret=' . $conf['hCaptcha']['SecretKey'] . '&response=' . $hcaptchaResponse);

	// Check if we could call home:
	if($hcaptchaCallingHome === FALSE)
		die('Uh oh! Could not contact hCaptcha servers!');

	// Try to decode the JSON response:
	if( ($verificationData = json_decode($hcaptchaCallingHome)) === NULL )
		die('Uh oh! Could not decode hCaptcha JSON response!');

	// Finally check if hCaptcha says the response was valid:
	if(!$verificationData->success)
		die('Uh oh! Your hCaptcha was invalid! Try again.');
}

do {
	$id = uniqid();
} while(file_exists('pastes/'.$id));

$success = file_put_contents( 'pastes/' . $id , $code );
if($success === false)
	die('Error while storing paste! Go back with your browser.');

if($conf['PrettyRewrite'] === true)
	header('location:v/' . $id);
else
	header('location:view.php?i=' . $id);
