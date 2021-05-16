<!DOCTYPE html>
<html class="loading" lang="{{ App::getLocale() }}"
    data-textdirection="{{ LaravelLocalization::getCurrentLocaleDirection() }}"
    dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui, user-scalable=no">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- THE PAGE TITLE -->
    <title>@yield('pageTitle', __('general.' . getModel()))</title>

    <!-- BEGIN PAGE ICON -->

    <link rel="apple-touch-icon" href="{{ path('images/ico/apple-icon-120.png') }}">
    <!-- END PAGE ICON -->

    <!-- BEGIN FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ path('images/ico/favicon.ico') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <!-- END FAVICON -->

    <!-- BEGIN GOOGLE FONT -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700">
    <!-- END GOOGLE FONT -->

    <!-- BEGIN iCONS -->
    <link rel="stylesheet" href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{ path('js/scripts/fontawesome/css/all.min.css') }}">
    <!-- END iCONS -->

    <!-- BEGIN VENDOR CSS -->
    <link rel="stylesheet" type="text/css" href="{{ path(pageDir('css') . '/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ path('vendors/css/extensions/sweetalert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ path('vendors/css/extensions/jquery.toolbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ path('vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ path('vendors/css/forms/icheck/custom.css') }}">

    <!-- BEGIN MODERN CSS -->
    <link rel="stylesheet" type="text/css" href="{{ path(pageDir('css') . '/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ path(pageDir('css') . '/custom-rtl.css') }}">
    <!-- END MODERN CSS -->

    <!-- BEGIN Page Level CSS -->
    <link rel="stylesheet" type="text/css" href="{{ path(pageDir('css') . '/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ path(pageDir('css') . '/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ path('css-rtl/plugins/forms/checkboxes-radios.css') }}">
    <!-- END Page Level CSS -->

    <!-- BEGIN TOASTR CSS -->
    @toastr_css
    <!-- END TOASTR CSS -->

    <!-- BEGIN CUSTOM CSS -->
    <link rel="stylesheet" type="text/css" href="{{ path('custom/css/style.css') }}">
    <!-- END CUSTOM CSS -->

    <!-- BEGIN INCLUDE STYLE CODE CSS -->
    @yield('style') @stack('style')
    <!-- END INCLUDE STYLE CODE CSS -->

</head>

<body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu" data-col="2-columns">
