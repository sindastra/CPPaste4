#!/bin/sh
#
# CPPaste4
# Copyright (c) 2015 - 2021 Sindastra <https://github.com/sindastra>
# All rights reserved.
#
# The above copyright notice and this notice shall be included in all
# copies or substantial portions of the Software.
#
# See LICENSE file for more info.
#
# @author Sindastra <https://github.com/sindastra>
# @copyright (c) 2015 - 2021 Sindastra <https://github.com/sindastra>

# Set up yuicompressor
if [ -f "toolchain/yuicompressor-2.4.8.jar" ]; then
    echo yuicompressor already downloaded
else
    cd toolchain
    if [ ! -f yuicompressor-2.4.8.zip ]; then
        wget https://github.com/yui/yuicompressor/releases/download/v2.4.8/yuicompressor-2.4.8.zip
    fi
    unzip yuicompressor-2.4.8.zip
    rm -f yuicompressor-2.4.8.zip
fi
