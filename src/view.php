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

function hilight_code($string)
{
	$swapColors = array(
			'<span style="color: #000000">' => '<span style="color: #0f0">',
			'<span style="color: #DD0000">' => '<span style="color: #ff0">',
			'<span style="color: #007700">' => '<span style="color: #58f">',
			'<span style="color: #0000BB">' => '<span style="color: #fff">',
			'<span style="color: #FF8000">' => '<span style="color: #ccc">'
		);

	$highlighted = highlight_string($string, true);

	return str_replace(array_keys($swapColors), $swapColors, $highlighted);
}

if( isset($_GET['i']) && ctype_alnum($_GET['i']) )
	$id = $_GET['i'];
else
	die('No (or invalid) ID received!');

if(!file_exists('pastes/' . $id))
	die('Paste does not exist.');

if(isset($_GET['raw']))
{
	header('Content-Type: text/plain');
	echo gzuncompress( file_get_contents('pastes/' . $id) );
}
else
{
	$pasteTimestamp = hexdec(substr($id, 0, -5));
	$pasteTimeHuman = date('r', $pasteTimestamp);
	echo '<!doctype html><html><head>';
	echo '<meta charset="utf-8">';
	echo '<title>' . $pasteTimeHuman . '</title>';
	echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
	echo '<link rel="stylesheet" type="text/css" href="/style.css">';
	echo '</head><body>';
	echo hilight_code( gzuncompress( file_get_contents('pastes/' . $id) ) );
	echo '</body></html>';
}
