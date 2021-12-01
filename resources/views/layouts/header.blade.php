<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('img/favicon.png') }}">

    <title>{{ env('APP_NAME') }}</title>

    <!-- CSS - REQUIRED - START -->
    <!-- Batch Icons -->
    <link rel="stylesheet" href="{{ asset('fonts/batch-icons/css/batch-icons.css') }}">
    <!-- Custom Scrollbar -->
    <link rel="stylesheet" href="{{ asset('plugins/custom-scrollbar/jquery.mCustomScrollbar.min.css') }}">



    <!-- CSS - REQUIRED - END -->

    <!-- CSS - OPTIONAL - START -->

    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

    <!-- CSS - OPTIONAL - END -->

    <!-- QuillPro & Bootstrap Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Bootstrap core JavaScript -->
    <!-- JQuery -->
<!--    <script type="text/javascript" src="{{ asset('js/jquery/jquery-3.4.1.min.js') }}"></script>-->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    @yield('styles')
</head>

<body>
<div class="container-fluid">
    <div class="row">
