<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-alpha.5
* @link https://github.com/tabler/tabler
* Copyright 2018-2019 The Tabler Authors
* Copyright 2018-2019 codecalm.net Paweł Kuna
* Licensed under MIT (https://tabler.io/license)
-->
<html lang="en">
<head>
    <base href="http://localhost/singleseaters/tablertheme/">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
	<meta name="description" content="Check out racing calendars for your favorite single seater series!">
	<meta name="keywords" content="f1, f2, singleseater, openwheel, wheel, race, calendar, indy, indycar, formula, super, time, starting, when, timing">
	<meta name="author" content="ra1g">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Singleseaters.net - <?= $title; ?></title>
    <meta name="msapplication-TileColor" content="#206bc4"/>
    <meta name="theme-color" content="#206bc4"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="mobile-web-app-capable" content="yes"/>
    <meta name="HandheldFriendly" content="True"/>
    <meta name="MobileOptimized" content="320"/>
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon"/>
    <!-- Libs CSS -->

    <!-- Tabler Core -->
    <link href="./dist/css/tabler.css" rel="stylesheet"/>
    <!-- Tabler Plugins -->
    <link href="./dist/css/tabler-buttons.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"/>
    <link href="./dist/css/jquery-ui.min.css" rel="stylesheet"/>
</head>
<body class="antialiased <?php if(!isset($_COOKIE['myTheme'])) { echo ''; } else { echo $_COOKIE['myTheme'];} ?>">