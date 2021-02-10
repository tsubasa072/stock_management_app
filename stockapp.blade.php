<html>
<head>
    <title>@yield('title')</title>
    <style>
    header {border:solid 2px;
            height: 100pt; text-align: center;
            font-size: 50pt;}
    h2 {Margin:1px 0px;
        border:solid 2px;
        height: auto;}
    .footer {border:solid 2px;
            height: 100pt; text-align: center;}
    </style>
</head>
<body>
    <header>@yield('title')</header>
    @section('menubar')
    <h2 class="menutitle">メニュー</h2>
    @show
    <div class="content">
    @yield('content')
    </div>
    <div class="footer">
    @yield('footer')
    </div>
</body>
</html>
