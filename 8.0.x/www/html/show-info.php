<?php
$timeBeg = microtime(true);

chdir(__DIR__);
ini_set('max_execution_time', 60 * 5);

$res = [];

$res['app-env'] = [];
$resRef = &$res['app-env'];
try {
    $keys = [
        'IMAGE_NAME',
    ];
    foreach ($keys as $key){
        $resRef[$key] = getenv($key);
    }
}catch (Exception $e){
    $resRef[] = $e;
}

$res['composer-env'] = [
    '@see' => 'https://getcomposer.org/doc/03-cli.md#environment-variables'
];
$resRef = &$res['composer-env'];
try {
    $keys = [
        'COMPOSER',
        'COMPOSER_ALLOW_SUPERUSER',
        'COMPOSER_ALLOW_XDEBUG',
        'COMPOSER_DISABLE_XDEBUG_WARN',
        'COMPOSER_HOME',
        'COMPOSER_ALLOW_XDEBUG',
        'COMPOSER_AUTH',
        'COMPOSER_BIN_DIR',
        'COMPOSER_CACHE_DIR',
        'COMPOSER_CAFILE',
        'COMPOSER_DISABLE_XDEBUG_WARN',
        'COMPOSER_DISCARD_CHANGES',
        'COMPOSER_FUND',
        'COMPOSER_HOME',
        'COMPOSER_HTACCESS_PROTECT',
        'COMPOSER_MEMORY_LIMIT',
        'COMPOSER_MIRROR_PATH_REPOS',
        'COMPOSER_NO_INTERACTION',
        'COMPOSER_PROCESS_TIMEOUT',
        'COMPOSER_ROOT_VERSION',
        'COMPOSER_VENDOR_DIR',
        'COMPOSER_RUNTIME_ENV',
        'http_proxy',
        'HTTP_PROXY',
        'HTTP_PROXY_REQUEST_FULLURI',
    ];
    foreach ($keys as $key){
        $resRef[$key] = getenv($key);
    }
}catch (Exception $e){
    $resRef[] = $e;
}

$res['$_ENV'] = $_ENV;
try {
    $res['getenv()'] = getenv();
}catch (Exception $e){
    $res['getenv()'] = $e;
}

$commands = [
    'pwd',
    'ls -l',
    'ls -l 	/etc/php.d/',
    'sh show-info.sh',
];

foreach ($commands as $command) {
    $command .= " 2>&1";
    $out = '';
    exec($command, $out, $status);
    $res[] = [
        'cmd' => $command,
        'output' => $out,
        'status' => $status
    ];
}
$timeEnd = microtime(true);
array_unshift(
    $res, [
    'beg' => $timeBeg,
    'end' => $timeEnd,
    'left-seconds' => $timeEnd - $timeBeg,
    'left-minutes' => ($timeEnd - $timeBeg) / 60,
]
);

echo '<pre>';
print_r($res);
echo '<pre>';