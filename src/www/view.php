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
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $pasteTimeHuman; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="/style.css">
		<!-- Internet Explorer HTML5 hack - Make it aware of the nav tag: -->
		<!--[if IE]>
		<script>
			document.createElement('nav');
		</script>
		<![endif]-->
	</head>
	<body>
		<nav role="navigation" class="nav">
			<ul id="nav-main">
			<?php if($conf['PrettyRewrite'] === true): ?>
				<li><a href="//<?php echo $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI] . '/raw' ?>">RAW</a></li>
			<?php else: ?>
				<li><a href="//<?php echo $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI] . '&raw' ?>">RAW</a></li>
			<?php endif; ?>
			</ul>
		</nav>
<?php echo hilight_code( get_paste_contents($id) ); // Keep this to the left to avoid spaces ?>
	<?php if(!empty($conf['trackingPixel'])): ?>
		<img class="borderless" src="<?php echo $conf['trackingPixel']; ?>" height="1" width="1" border="0" alt="" />
	<?php endif; ?>
	</body>
</html>
<?php
}
