<!DOCTYPE html>
<html>
    <head>
        @include('includes.head')
    </head>
    <body >
        <header>
            @include('includes.header')
        </header>
        <main>
            @yield('content')
        </main>
        <footer class="page-footer dark">
            <div class="footer">
            @include('includes.footer')
            </div>
        </footer>
        @include("includes.scripts")
    </body>
</html>
