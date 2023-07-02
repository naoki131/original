@extends('layouts.app')

@section('content')

<div>
    <h1>ユーザー情報</h1>
    <x-alert type="success" :session="session('success')"/>
    <div class="card m-5">
        <form action="{{route('editProfile')}}" method="post">
            @csrf
            <div class="card-body">
                @foreach($errors->get('name') as $error)
                <li style="color:red">{{$error}}</li>
                @endforeach
                <div><label for="name">ユーザー名</label><input type="text" name="name" id="name" value="{{Auth::User()->name}}"></div>
                @foreach($errors->get('email') as $error)
                <li style="color:red">{{$error}}</li>
                @endforeach
                <div><label for="email">メールアドレス</label><input type="email" name="email" id="email" value="{{Auth::User()->email}}"></div>
              
                <button>変更</button>
            </div>
        </form>
    </div>
    <a href="{{route('home')}}">ホームに戻る</a>
</div>
@endsection