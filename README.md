[![ko-fi](https://www.ko-fi.com/img/githubbutton_sm.svg)](https://ko-fi.com/W7W215OZB)
# CPPaste4

**CPPaste4** is a minimalistic web-app used to store and share code pastes. **Kind of like GitHub's Gists!**

It supports all modern browsers but also a bunch of old ones, down to IE8! It also runs on IE6 but that's not officially supported... IE8 is supported for fun. But you should not be using IE8 in 2019... really.

The name is derived from **CPP** (**C++**) and **Paste**!

It's called version **4** as it's the fourth version I'm writing from scratch (each being completely different and with a different goal, this one to be minimalistic) and this version is the first to be open source! See the [Wiki](https://github.com/sindastra/CPPaste4/wiki) for more info.

# Getting it

You might be interested in the [releases page](https://github.com/sindastra/CPPaste4/releases).

Pulling from the master branch and using the contents from ```src/www``` is an option and should be stable but not recommended for production environments. Use the release tarball for production instead.

# Installation

Basically, publish the contents of this repo's ```src/www``` or the contents of the release tarball to your webhost.

Make sure to rename ```inc.config.sample.php``` to ```inc.config.php``` and edit it accordingly.

Make sure to rename the ```legal/*.tpl.txt``` to ```legal/*.txt``` and edit them accordingly.

# Note on security and Apache2 deployment

You'll want to set some headers and settings, make sure to always serve over HTTPS only.

Apache2 VirtualHost config (append) for TLS/SSL enabled site:
```
SSLCipherSuite HIGH:!aNULL:!MD5
SSLProtocol all -SSLv2 -SSLv3 -TLSv1 -TLSv1.1
Header always set Strict-Transport-Security "max-age=63072000; includeSubDomains; preload"
Header always set X-Content-Type-Options: nosniff
Header always set X-XSS-Protection: 1
Header always set X-Frame-Options: deny
Header always set Content-Security-Policy: "default-src 'self'; form-action 'self'; base-uri 'none'; frame-ancestors 'none';"
```

# Quick testing for development

On Debian based systems like Ubuntu:

Make sure you have git and php-cli installed:
```
sudo apt install git php-cli
```
Then clone, navigate into the web-app directory and serve it with PHP:
```
git clone git://github.com/sindastra/CPPaste4.git
cd CPPaste4/src/www/
php -S 127.0.0.1:8000
```
And then navigate to http://localhost:8000/

# Legal

Copyright (c) 2015 - 2019 [Sindastra](https://github.com/sindastra)
All rights reserved.

Don't forget to take a look at the [LICENSE](LICENSE.md)!
