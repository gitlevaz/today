@include('includes.header')
<head>
<link rel="stylesheet"  href="{{asset('css/main.css')}}">


</head>
<body>
    {{-- <div id="app"> --}}
        @include('includes.navbar')

        <main class="py-4 section_main">
            @yield('content')
        </main>
    {{-- </div> --}}
</body>
</html>
