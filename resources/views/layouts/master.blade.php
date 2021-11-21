<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.head-tag')
@yield('head-tag')


<body dir="rtl">
    <div id="app">

        @include('layouts.navbar')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

@include('layouts.scripts')
@yield('script')

</html>
