#!/bin/sh
#
# CPPaste4
# Copyright (c) 2015 - 2018 Sindastra <https://github.com/sindastra>
# All rights reserved.
#
# The above copyright notice and this notice shall be included in all
# copies or substantial portions of the Software.
#
# See LICENSE file for more info.
#
# @author Sindastra <https://github.com/sindastra>
# @copyright (c) 2015 - 2018 Sindastra <https://github.com/sindastra>

mkdir -p toolchain
cd toolchain
rm *.zip *.jar
wget https://github.com/yui/yuicompressor/releases/download/v2.4.8/yuicompressor-2.4.8.zip
unzip *.zip
rm *.zip
