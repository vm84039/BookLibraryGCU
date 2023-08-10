
<head>
    @include('includes.head')
</head>
<body   min-height="100vh" style="position: relative; margin: 50px">
<header>
    @include('customer.customerHeader')
</header>
    <main style="padding-bottom: 5rem;min-height:800px; width: 100%" >
        @yield('content')
    </main>
    <footer class="page-footer dark">
        @include('includes.footer')
    </footer>

@include("includes.scripts")
</body>

