<?php
if(isset($_COOKIE['myLoginToken'])){
    if($_COOKIE['myLoginToken'] != '1e488f15c4b4cb0c7682877cf9c0f2f6a8d5de739c269'){
        header("Location: ../500.php");
    }
} else if(empty($_COOKIE['myLoginToken'])) {
    header("Location: ../500.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <base href="http://localhost/singleseaters/tablertheme/">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Admin Dashboard - Singleseaters.net</title>
    <meta name="msapplication-TileColor" content="#206bc4"/>
    <meta name="theme-color" content="#206bc4"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="mobile-web-app-capable" content="yes"/>
    <meta name="HandheldFriendly" content="True"/>
    <meta name="MobileOptimized" content="320"/>
    <meta name="robots" content="noindex,nofollow,noarchive"/>
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon"/>
    <link href="./dist/css/zephyr.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"/>
</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="admin/">Singleseaters.net Dashboard</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3 text-danger" href="admin/signout">Sign out <i class="fas fa-sign-out-alt"></i></a>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link <?php if (preg_match("~\badmin/index.php\b~", $_SERVER['PHP_SELF'])) { echo 'text-primary'; } else { echo ''; } ?>" aria-current="page" href="admin">
                            <i class="fas fa-home"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./">
                            <i class="fas fa-external-link-alt"></i>
                            Singleseaters.net
                        </a>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link <?php if (preg_match("~\badmin/f1cal.php\b~", $_SERVER['PHP_SELF'])) { echo 'text-primary'; } else { echo ''; } ?>" href="admin/f1cal">
                            <i class="fas fa-edit"></i>
                            Formula 1 calendar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (preg_match("~\badmin/f2cal.php\b~", $_SERVER['PHP_SELF'])) { echo 'text-primary'; } else { echo ''; } ?>" href="admin/f2cal">
                            <i class="fas fa-edit"></i>
                            Formula 2 calendar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (preg_match("~\badmin/indycal.php\b~", $_SERVER['PHP_SELF'])) { echo 'text-primary'; } else { echo ''; } ?>" href="admin/indycal">
                            <i class="fas fa-edit"></i>
                            IndyCar calendar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (preg_match("~\badmin/sfcal.php\b~", $_SERVER['PHP_SELF'])) { echo 'text-primary'; } else { echo ''; } ?>" href="admin/sfcal">
                            <i class="fas fa-edit"></i>
                            SuperFormula calendar
                        </a>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link <?php if (preg_match("~\badmin/faq.php\b~", $_SERVER['PHP_SELF'])) { echo 'text-primary'; } else { echo ''; } ?>" href="admin/faq">
                            <i class="fas fa-question-circle"></i>
                            Edit FAQ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (preg_match("~\badmin/news.php\b~", $_SERVER['PHP_SELF'])) { echo 'text-primary'; } else { echo ''; } ?>" href="admin/news">
                            <i class="fas fa-question-circle"></i>
                            Edit News
                        </a>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="admin/signout">
                            <i class="fas fa-sign-out-alt"></i>
                            Sign out
                        </a>
                    </li>
                </ul>
            </div>
        </nav>