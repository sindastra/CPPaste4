<?php
/**
 * CPPaste4
 *
 * Copyright (c) 2015 - 2019 Sindastra <https://github.com/sindastra>
 * All rights reserved.
 *
 * The above copyright notice and this notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * See LICENSE file for more info.
 *
 * @author Sindastra <https://github.com/sindastra>
 * @copyright (c) 2015 - 2019 Sindastra <https://github.com/sindastra>
 */

include('confighandler.php');

function get_paste_contents($i)
{
	global $legal;
	if($legal === true)
	{
		$legalFile = 'legal/' . $i . '.txt';

		if( !file_exists($legalFile) )
			return "Note to webmaster: Please create $legalFile (newly or by renaming the .tpl file)";
		else
			return file_get_contents($legalFile);
	}
	else
		return gzuncompress( file_get_contents('pastes/' . $i) );
}

if( isset($_GET['i']) && ctype_alnum($_GET['i']) )
	$id = $_GET['i'];
else
	die('No (or invalid) ID received!');

$legal = false;
if($id == 'terms' || $id == 'privacy' || $id == 'contact')
	$legal = true;

if($legal === false && !file_exists('pastes/' . $id))
	die('Paste does not exist.');

if(isset($_GET['raw']))
{
	header('Content-Type: text/plain');
	echo get_paste_contents($id);
}
else
{
	$pasteTimestamp = hexdec(substr($id, 0, -5));
	$pasteTimeHuman = date('r', $pasteTimestamp);
	echo '<!DOCTYPE html><html><head>';
	echo '<meta charset="utf-8">';
	echo '<title>' . $pasteTimeHuman . '</title>';
	echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
	echo '<link rel="stylesheet" type="text/css" href="/style.css">';
	echo '</head><body>';
	echo get_paste_contents($id);
	if(!empty($conf['trackingPixel']))
		echo '<img class="borderless" src="' . $conf['trackingPixel'] . '" height="1" width="1" border="0" alt="" />';
	echo '</body></html>';
}
