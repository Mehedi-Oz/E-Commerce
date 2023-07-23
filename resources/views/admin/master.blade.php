<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/')}}admin/assets/images/favicon.png">

    <title>@yield('title')</title>
    @include('admin.includes.style')

</head>

<body class="skin-blue fixed-layout">

<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">Elite admin</p>
    </div>
</div>

<div id="main-wrapper">

    @include('admin.includes.header')

    @include('admin.includes.sidebar')

    <div class="page-wrapper">
        <div class="container-fluid">
            @yield('body')
        </div>
    </div>

    @include('admin.includes.footer')

</div>

@include('admin.includes.script')

</body>
</html>
