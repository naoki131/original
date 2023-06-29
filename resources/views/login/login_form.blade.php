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
<div class="text-center m-5" >
    <h1>ログインフォーム</h1>
    @if(session('login_error'))
            <div class="alert alert-success">
                {{session('login_error')}}
            </div>
    @endif
    <form method="post" action="{{route('login')}}">
        @csrf
        <div class="mb-3">
            @foreach($errors->get('email') as $error)
                <li style="color:red">{{$error}}</li>
            @endforeach
            <label for="inputEmail"  class="form-label">Email address</label>
            <input type="email"  name="email" id="inputEmail" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">メールアドレスを入力してください。</div>
        </div>
        <div class="mb-3">
        @foreach($errors->get('password') as $error)
                <li style="color:red">{{$error}}</li>
            @endforeach
            <label for="inputPassword"  class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="inputPassword">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>