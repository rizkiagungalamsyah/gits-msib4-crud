<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CRUD | Cart</title>
    <meta name="description" content="ShaynaAdmin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @stack('before-style')
    @include('layouts.style')
    @stack('after-style')

</head>

<body>
    @include('layouts.sidebar')
    <div id="right-panel" class="right-panel">
        @include('layouts.navbar')
        <div class="content">
            @yield('content')
        </div>
        <div class="clearfix"></div>
    </div>
    @stack('before-script')
    @include('layouts.script')
    @stack('after-script')
</body>

</html>
