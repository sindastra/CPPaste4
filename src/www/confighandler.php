<?php
/**
 * CPPaste4
 *
 * Copyright (c) 2015 - 2021 Sindastra <https://github.com/sindastra>
 * All rights reserved.
 *
 * The above copyright notice and this notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * See LICENSE file for more info.
 *
 * @author Sindastra <https://github.com/sindastra>
 * @copyright (c) 2015 - 2021 Sindastra <https://github.com/sindastra>
 */

if(file_exists('inc.config.php'))
	include('inc.config.php');
else if(file_exists('inc.config.sample.php'))
	include('inc.config.sample.php');
else
	die('No config (not even sample config!) was found!');
