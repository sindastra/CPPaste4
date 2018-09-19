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

if(isset($_POST['code']) && isset($_POST['sb']))
	if(!empty(trim($_POST['code'])) && ($_POST['sb'] === ''))
		$code = gzcompress($_POST['code'], 9);
	else
		die('No or incorrect data received.');

$id = uniqid();

$success = file_put_contents( 'pastes/' . $id , $code );
if($success === false)
	die('Error while storing paste! Go back with your browser.');

header('location:v/' . $id . '/');
