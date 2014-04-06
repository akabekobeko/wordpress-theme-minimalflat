#!/bin/sh

# It is a script to generate the release image.
# ex: $ bash release.sh v1.0.0
# 
# @param $1 Version suffix

TARGETDIR=minimalflat

mkdir ${TARGETDIR}

# Sub directories
cp -r css       ${TARGETDIR}
cp -r fonts     ${TARGETDIR}
cp -r images    ${TARGETDIR}
cp -r js        ${TARGETDIR}
cp -r languages ${TARGETDIR}

# Files
cp comments.php     ${TARGETDIR}
cp editor_style.css ${TARGETDIR}
cp footer.php       ${TARGETDIR}
cp functions.php    ${TARGETDIR}
cp header.php       ${TARGETDIR}
cp index.php        ${TARGETDIR}
cp page.php         ${TARGETDIR}
cp readme.txt       ${TARGETDIR}
cp screenshot.png   ${TARGETDIR}
cp searchform.php   ${TARGETDIR}
cp sidebar.php      ${TARGETDIR}
cp single.php       ${TARGETDIR}
cp style.css        ${TARGETDIR}

find ${TARGETDIR} -name ".DS_Store" -print -exec rm {} ";"
zip -r minimalflat-$1.zip ${TARGETDIR}
rm -rf ${TARGETDIR}
