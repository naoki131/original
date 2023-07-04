
@extends('layouts.app')

@section('content')
  
    <div class="cotainer">
        <div class="mt-5">
            <x-alert type="success" :session="session('success')"/>
            
            <h3>プロフィール</h3>
            <ul>
                <li>名前:{{Auth::user()->name}}</li>
                <li>メールアドレス:{{Auth::user()->email}}</li>
                <li><a href="{{route('showSugoroku')}}">すごろくをする</a></li>
            </ul>
        </div>

    </div>

    @endsection