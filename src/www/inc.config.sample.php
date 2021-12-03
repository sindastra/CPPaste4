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

// Set the parameters below and rename this file by removing the '.sample'!

$conf = array(
	'PrettyRewrite' => false,
	'trackingPixel' => '', // OPTIONAL URL to tracking pixel image
	'OnionSite' => '', // OPTIONAL full URL to onion (Tor) version of site
	'reCAPTCHA' => array(
		// If no keys are specified, reCAPTCHA is not used!
		'SiteKey' => '',
		'SecretKey' => ''
	),
	'hCaptcha' => array(
		// If no keys are specified, hCaptcha is not used!
		'SiteKey' => '', // Test key: 10000000-ffff-ffff-ffff-000000000001
		'SecretKey' => '', // Test key: 0x0000000000000000000000000000000000000000
	)
);
