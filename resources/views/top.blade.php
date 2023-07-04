@extends('layouts.app')

@section('content')
<div class="text-center">
<x-alert type="success" :session="session('success')"/>
<h1>こんにちは</h1>
<p><a href="{{route('showLogin')}}">ログイン</a></p>
<p><a href="{{route('register')}}">新規会員登録</a></p>

</div>
@endsection