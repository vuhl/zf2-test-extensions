<?php

$loader = null;
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    echo 1;
    $loader = include __DIR__ . '/vendor/autoload.php';
} else if (file_exists(__DIR__ . '/../../../autoload.php')) {
    echo 2;
    $loader = include __DIR__ . '/../../../autoload.php';
} else {
    throw new RuntimeException('vendor/autoload.php could not be found. Did you run `php composer.phar install`?');
}
echo 3;
