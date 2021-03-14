<html>
<head>
    <title>@yield('title')</title>
    <style>
    header {border:solid 2px;
            text-align: center;
            font-size: 50pt;}

    h1      {border:solid 2px;}

    .footer {border:solid 2px;
            height: 100pt; text-align: center;}
    header,.wrapper,.footer {background-color: #fcc;}
    </style>
</head>
<body>
    <header>
      @yield('title')
    </header>
    <div class="wrapper">
       <div class="menubar">
        @section('menubar')
        @show
       </div>

       <div class="content">
        <h1>@yield('content')</h1>
       </div>
    </div>

       <div class="footer">
        @yield('footer')
       </div>
</body>
</html>
