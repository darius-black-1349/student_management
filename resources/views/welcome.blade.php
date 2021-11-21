<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.project') }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body dir="rtl">
    <div class="container-fluid w-100 bg-primary">
        @if (Route::has('login'))
        <div class="py-4 mx-auto d-flex justify-content-between align-items-center">
            <a class="text-white text-decoration-none" href="{{ route('welcome') }}">{{ config('app.project') }}</a>

            <div class="">
                @auth
                <a href="{{ url('/home') }}" class="text-white text-decoration-none">خانه</a>
                @else
                <a href="{{ route('login') }}" class="text-white text-decoration-none">ورود</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="mr-3 text-white text-decoration-none">ثبت نام</a>
                @endif
                @endauth
            </div>
        </div>
        @endif

    </div>

    @if (Route::has('welcome'))
    <div class="d-flex justify-content-center align-items-center mt-5">
        <p class="text-white display-4">
            مدیریت دانش آموزان
        </p>
    </div>
    @endif
</body>

</html>
