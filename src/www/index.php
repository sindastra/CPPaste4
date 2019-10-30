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

include('confighandler.php');

?>
<!DOCTYPE html>
<html>
	<head>
		<title>CPPaste4</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="style.css">
		<!-- Internet Explorer HTML5 hack - Make it aware of the nav tag: -->
		<script>
			document.createElement('nav');
		</script>
	</head>
	<body>
		<form method="post" action="post.php">
			<textarea id="code" name="code" autofocus></textarea>
			<input type="text" name="sb" style="display:none">
			<br />
			<button id="submit" type="submit">Paste!</button>
		</form>
		<nav role="navigation" class="nav">
			<ul id="nav-main">
			<?php if($conf['PrettyRewrite'] === true): ?>
				<li><a href="/terms">Terms</a></li>
				<li> - </li>
				<li><a href="/privacy">Privacy</a></li>
				<li> - </li>
				<li><a href="/contact">Contact</a></li>
			<?php else: ?>
				<li><a href="view.php?i=terms">Terms</a></li>
				<li> - </li>
				<li><a href="view.php?i=privacy">Privacy</a></li>
				<li> - </li>
				<li><a href="view.php?i=contact">Contact</a></li>
			<?php endif; ?>
			</ul>
		</nav>
		<?php if(!empty($conf['trackingPixel'])): ?>
		<img src="<?php echo $conf['trackingPixel'] ?>" height="1" width="1" border="0" style="border:0" alt="" />
		<?php endif; ?>
	</body>
</html>