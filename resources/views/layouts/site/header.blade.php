<!DOCTYPE html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>{{ env('APP_NAME') }}</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.svg"/>
    <!-- Place favicon.ico in the root directory -->

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset("css/bootstrap-5.0.0-alpha-2.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("css/LineIcons.2.0.css") }}" />
    <link rel="stylesheet" href="{{ asset("css/animate.css") }}" />
    <link rel="stylesheet" href="{{ asset("css/main.css") }}" />
</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">
You are using an <strong>outdated</strong> browser. Please
<a href="https://browsehappy.com/">upgrade your browser</a> to improve
your experience and security.
</p>
<![endif]-->

<!-- ========================= preloader start ========================= -->
<div class="preloader">
    <div class="loader">
        <div class="ytp-spinner">
            <div class="ytp-spinner-container">
                <div class="ytp-spinner-rotator">
                    <div class="ytp-spinner-left">
                        <div class="ytp-spinner-circle"></div>
                    </div>
                    <div class="ytp-spinner-right">
                        <div class="ytp-spinner-circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- preloader end -->

<!-- ========================= header start ========================= -->
<header class="header">
    <div class="navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="index.html">
                            <img src="{{ asset('images/upgest.png') }}" alt="UpGest" />
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="page-scroll" href="#home">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#features">Recursos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#about">Sobre</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#pricing">Planos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="{{ route('dashboard') }}">Entrar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="">Cadastrar</a>
                                </li>
                            </ul>
                        </div>
                        <!-- navbar collapse -->
                    </nav>
                    <!-- navbar -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- navbar area -->
</header>
<!-- ========================= header end ========================= -->
