<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- ファビコン -->
    <link rel="shortcut icon" href="/images/favicon.jpg" type="image/x-icon">
    <!-- ajax -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
  
    <div class="cotainer">
        <div class="mt-5">
            @if(session('login_success'))
            <div class="alert alert-success">
                {{session('login_success')}}
            </div>
            @endif
            <h3>プロフィール</h3>
            <ul>
                <li>名前:{{Auth::user()->name}}</li>
                <li>メールアドレス:{{Auth::user()->email}}</li>
            </ul>
        </div>

    </div>
</body>