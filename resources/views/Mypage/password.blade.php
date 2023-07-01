@extends('layouts.app')

@section('content')
<div>
    <h1>パスワードの変更</h1>
    <x-alert type="danger" :session="session('danger')" />
    <x-alert type="success" :session="session('success')"/>
    <div>
        <div class="card m-5">
            <div class="card-body">
                <div class="card-title">パスワードを変更しよう</div>
                <form action="{{route('editPassword')}}" method="post">
                    @csrf
                    @foreach($errors->get('password1') as $error)
                    <li style="color:red">{{$error}}</li>
                    @endforeach
                    <div><label for="password1">現在のパスワード</label><input type="password" name="password1" id="password1"></div>
                    <div><label for="password2">新しいパスワード</label><input type="password" name="password2" id="password2"></div>
                    <button>変更する</button>
                </form>
            </div>
            <a href="#">パスワードを忘れた場合はこちら</a>
            <a href="{{route('home')}}">ホーム画面に戻る</a>
        </div>
    </div>
</div>
@endsection