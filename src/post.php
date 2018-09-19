<?php
/**
 * CPPaste4
 *
 * Copyright (c) 2015 - 2018 Sindastra <https://github.com/sindastra>
 * All rights reserved.
 *
 * The above copyright notice and this notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * See LICENSE file for more info.
 *
 * @author Sindastra <https://github.com/sindastra>
 * @copyright (c) 2015 - 2018 Sindastra <https://github.com/sindastra>
 */

if(file_exists('inc.config.php'))
	include('inc.config.php');
else
	include('inc.config.sample.php');

if(isset($_POST['code']) && isset($_POST['sb']))
	if(!empty(trim($_POST['code'])) && ($_POST['sb'] === ''))
		$code = gzcompress($_POST['code'], 9);
	else
		die('No (or incorrect) data received!');

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
