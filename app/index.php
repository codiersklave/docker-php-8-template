<?php

const CACHE_LIFETIME = 10;

$mc = new Memcached();
$mc->addServer("glenmorangie_memcached", 11211);

$firstName = $mc->get('first_name');
$lastName = $mc->get('last_name');
$email = $mc->get('email');

echo '<hr>';
echo '<strong>First Name</strong><br>' . var_export($firstName, true) . '<hr>';
echo '<strong>Last Name</strong><br>' . var_export($lastName, true) . '<hr>';
echo '<strong>Email</strong><br>' . var_export($email, true) . '<hr>';
echo '<pre>';

if ($firstName === false) {
    $firstName = 'Alexander';
    $check = $mc->add('first_name', $firstName, CACHE_LIFETIME);

    echo 'FIRST_NAME WRITTEN TO CACHE: ' . var_export($check, true) . PHP_EOL;
} else {
    echo 'FIRST_NAME READ FROM CACHE' . PHP_EOL;
}

if ($lastName === false) {
    $lastName = 'Serbe';
    $check = $mc->add('last_name', $lastName, CACHE_LIFETIME);

    echo 'LAST_NAME WRITTEN TO CACHE: ' . var_export($check, true) . PHP_EOL;
} else {
    echo 'LAST_NAME READ FROM CACHE' . PHP_EOL;
}

if ($email === false) {
    $email = 'codiersklave@yahoo.de';
    $check = $mc->add('email', $email, CACHE_LIFETIME);

    echo 'EMAIL WRITTEN TO CACHE: ' . var_export($check, true) . PHP_EOL;
} else {
    echo 'EMAIL READ FROM CACHE' . PHP_EOL;
}

echo '</pre>';
echo '<hr>';
echo '<strong>First Name</strong><br>' . var_export($firstName, true) . '<hr>';
echo '<strong>Last Name</strong><br>' . var_export($lastName, true) . '<hr>';
echo '<strong>Email</strong><br>' . var_export($email, true) . '<hr>';
