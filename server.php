<?php
$_SERVER['SCRIPT_FILENAME'] = __DIR__ . '/public/index.php';
if (preg_match('/\.(?:png|jpg|jpeg|gif|js|css|svg|ico)$/i', $_SERVER['REQUEST_URI'])) {
    return false;
}
if (is_file(__DIR__ . '/public' . $_SERVER['REQUEST_URI'])) {
    return false;
}
require __DIR__ . '/public/index.php';
