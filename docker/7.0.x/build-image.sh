#!/bin/bash
#------------------------------------------------------------------------------
echo ''
echo "$(printf '\x2D%.0s' {1..80})"
echo '-- BEG: script     : '$(realpath "${BASH_SOURCE[0]}")
echo '--    : script-dir : '$(dirname $(realpath "${BASH_SOURCE[0]}"))
echo '--    : pwd        : '$(realpath "${PWD}")
echo ''
#------------------------------------------------------------------------------
# Вывалиться из скрипта, если команда завершилась с ошибкой
set -e

#переход в директорию текущего скрипта
cd $(dirname $(realpath "${BASH_SOURCE[0]}"))
#------------------------------------------------------------------------------

. ./set-env.sh

echo "----------------"
echo "imageName      : <${imageName}>"
echo "imageVersion   : <${imageVersion}>"
echo "isPushImage    : <${isPushImage}>"
echo "isRemoveImage  : <${isRemoveImage}>"
echo "---------------"

#------------------------------------------------------------------------------


if [ "${isRemoveImage}" = '1'  ]; then
echo '-- remove image'
docker rmi ${imageName} -f
docker rmi ${imageName} -f
else
  echo '-- SKIP: remove image'
fi


#------------------------------------------------------------------------------

echo '-- build image'

docker build --progress plain          \
  --build-arg IMAGE_NAME=${imageName}  \
  --tag ${imageName}                   \
  ./

#------------------------------------------------------------------------------

if [ "${isPushImage}" = '1'  ]; then
  echo '-- push image'
  docker push ${imageName}
else
  echo '-- SKIP: push image'
fi

#------------------------------------------------------------------------------
echo "-- END: $(date +%Y-%m-%dT%T.%3N)"