@include('includes.header')
<head>
<link rel="stylesheet"  href="{{asset('css/main.css')}}">

</head>
<body>
    <div id="app">
        @include('includes.navbar')

        <main class="py-4 section_main2">
          <div class="wrapper-content">
            @yield('content')
          </div>

        </main>
    </div>
</body>
</html>
