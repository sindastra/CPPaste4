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

if($_POST['code'] && ($_POST['sb'] == '') )
	$code = gzcompress($_POST['code'], 9);
else
	die('No or incorrect data received.');

$id = uniqid();

file_put_contents( 'pastes/' . $id , $code );

header('location:v/' . $id . '/');