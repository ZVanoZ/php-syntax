isRemoveImage=1
isPushImage=1
imageVersion="$(date +%Y%m%d)"

if [ -f "./set-env.local.sh" ]; then
  . ./set-env.local.sh
fi

imageName="docker.io/zvanoz/php-7-0-dev:${imageVersion}"
