<?php
if (isset($_COOKIE['myLoginToken'])) {
    if ($_COOKIE['myLoginToken'] != '1e488f15c4b4cb0c7682877cf9c0f2f6a8d5de739c269') {
        header("Location: ../500.php");
    }
} else if (empty($_COOKIE['myLoginToken'])) {
    header("Location: ../500.php");
}

setcookie('myLoginToken', '', [
    'expires' => time() - 3600,
    'path' => '/',
    'domain' => '',
    'secure' => true,
    'httponly' => false,
    'samesite' => 'Strict',
]);

header("Location: ../");