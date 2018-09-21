#!/bin/sh
#/**
#* CPPaste4
#*
#* Copyright (c) 2015 - 2018 Sindastra <https://github.com/sindastra>
#* All rights reserved.
#*
#* The above copyright notice and this notice shall be included in all
#* copies or substantial portions of the Software.
#*
#* See LICENSE file for more info.
#*
#* @author Sindastra <https://github.com/sindastra>
#* @copyright (c) 2015 - 2018 Sindastra <https://github.com/sindastra>
#*/

mkdir -p snapshots

git diff --cached --exit-code
STATUS=$?

if [ ${STATUS} -eq 1 ]; then
	echo 'WORKING DIRECTORY CONTAINS UNCOMMITED CHANGES!'
	echo 'NOT MAKING DIRTY BUILDS! Bailing out...'
else

DATE=`date -u +%Y-%m-%d-%H%M%S`
BRANCH=`git rev-parse --abbrev-ref HEAD`
PRETTYHASH=`git log --pretty=format:'%h' -n 1`
SNAPSHOTNAME="CPPaste4-SNAPSHOT-${DATE}UTC-${BRANCH}-${PRETTYHASH}"

cp -rT src ${SNAPSHOTNAME}
java -jar toolchain/yuic*.jar src/style.css > ${SNAPSHOTNAME}/style.css
tar cvzf "snapshots/${SNAPSHOTNAME}.tgz" ${SNAPSHOTNAME}
rm -rf ${SNAPSHOTNAME}

fi
