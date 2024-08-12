#------------------------------------------------------------------------------
echo ''
echo "$(printf '\x2D%.0s' {1..80})"
echo '-- BEG: script     : '$(realpath "${BASH_SOURCE[0]}")
echo '--    : script-dir : '$(dirname $(realpath "${BASH_SOURCE[0]}"))
echo '--    : pwd        : '$(realpath "${PWD}")
echo "-- date +'%Y-%m-%dT%H:%I:%SZ': <$(date +'%Y-%m-%dT%H:%I:%SZ')>"
echo ''
#------------------------------------------------------------------------------
set +e

#export COMPOSER_HOME=$(mktemp -d)


cmdList=()
#cmdList+=("ls -l ${COMPOSER_HOME}")
cmdList+=("pwd")
cmdList+=("ls -l")
cmdList+=("whoami")
cmdList+=("env")
cmdList+=("set")
cmdList+=('echo $UID')
cmdList+=('echo $GROUPS')
cmdList+=("cat /etc/os-release")
cmdList+=("type bash")
cmdList+=("type sh")
cmdList+=("type svn")
cmdList+=("type git")
cmdList+=("type php")
cmdList+=("php -v")
cmdList+=("php -m")
cmdList+=("type composer")
cmdList+=("composer -V")

for cmd in "${cmdList[@]}"
do
  echo ''
  echo "#RUN: ${cmd}"
  eval "${cmd}"
  res=$?
  echo "#RES: <${res}>"
  echo ''
done


#------------------------------------------------------------------------------
echo ''
echo '-- END: script  : '$(realpath "${BASH_SOURCE[0]}")
echo '--    : pwd     : '$(realpath "${PWD}")
echo "$(printf '\x2D%.0s' {1..80})"
echo ''
#------------------------------------------------------------------------------