#!/bin/sh
mkdir -p toolchain
cd toolchain
rm *.zip *.jar
wget https://github.com/yui/yuicompressor/releases/download/v2.4.8/yuicompressor-2.4.8.zip
unzip *.zip
rm *.zip
