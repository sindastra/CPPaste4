#!/bin/sh
command -v rsync
if [ $? != "0" ]; then
    echo "FATAL: rsync not found. Please install."
    exit 1
fi

if [ ! -f mountpoint ]; then
    echo "FATAL: file 'mountpoint' not found. Please create it with path as content."
    exit 1
fi

mountpoint=`cat mountpoint`
if [ ! -d "${mountpoint}/" ]; then
    echo "FATAL: mount point path does not exist. Please check file 'mountpoint' and adjust path."
    exit 1
fi

rsync -ru src/www/ "${mountpoint}/"
