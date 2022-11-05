# CPPaste4

[![ko-fi](https://www.ko-fi.com/img/githubbutton_sm.svg)](https://ko-fi.com/W7W215OZB)

![Open Issues](https://img.shields.io/github/issues/sindastra/CPPaste4)

The name is derived from **CPP** (**C++**) and **Paste**! is a minimalistic web-app used to store and share code pastes. **Kind of like GitHub's Gists!**

### Written in pure PHP with features including but not limited to:

 - Honeypot to avoid spam
 - Supports Tor (configure an onion site link to appear in the nav bar)
 - Supports hCaptcha for advanced spam protection (might not work with onion sites)
 - Requiring no database server
 - Saving pastes as compressed files
 - No config needed (config optionally possible)
 - No PHP dependencies (only core PHP required)
 - No JavaScript (except for hCaptcha)
 - Easy deployment to web server
 - Wide range of browser support
 - Full UTF-8 support including emojis!

It supports all modern browsers but also a bunch of old ones, down to IE8! It also runs on IE6 but that's not officially supported... IE8 is supported for fun. But you should not be using IE8 in 2019... really. :wink:

# Getting it

You might be interested in the [releases page](https://github.com/sindastra/CPPaste4/releases).

Pulling from the master branch and using the contents from ```src/www``` is an option and should be stable but not recommended for production environments. Use the release tarball for production instead.

# Installation

Basically, publish the contents of this repo's ```src/www``` or the contents of the release tarball to your webhost.

Make sure to rename ```inc.config.sample.php``` to ```inc.config.php``` and edit it accordingly.

Make sure to rename the ```legal/*.tpl.txt``` to ```legal/*.txt``` and edit them accordingly.

# Note on security

Take a look at [Mozilla SSL Configuration Generator](https://ssl-config.mozilla.org/) and [HSTS Preload](https://hstspreload.org/)

Apache2 VirtualHost config (append):
```
Header always set X-Content-Type-Options: nosniff
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
And then navigate to <http://localhost:8000/>

### Additional Info

It's called **CPPaste4** as it's the fourth version I'm writing from scratch (each being completely different and with a different goal, this one to be minimalistic) and this version is the first to be open source! 

See the [Wiki](https://github.com/sindastra/CPPaste4/wiki) for more info.

#### Branch Rename

The branch `master` has been renamed to `main`, if you still have an old clone, try this:

```
git branch -m master main
git fetch origin
git branch -u origin/main main
git remote set-head origin -a
```

# Legal

Copyright (c) 2015 - 2021 [Sindastra](https://github.com/sindastra)
All rights reserved.

Don't forget to take a look at the [LICENSE](LICENSE.txt)!
