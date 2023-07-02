@extends('layouts.app')

@section('content')

<div>
    <div class="card m-5">
        <h1>新規会員登録</h1>
        <x-alert type="danger" :session="session('danger')" />
        <form action="{{route('register')}}" method="post">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    @foreach($errors->get('email') as $error)
                    <li style="color:red">{{$error}}</li>
                    @endforeach
                    <label for="email" class="form-label">Email address</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    @foreach($errors->get('name') as $error)
                    <li style="color:red">{{$error}}</li>
                    @endforeach
                    <label for="name" class="form-label">ユーザーネーム</label>
                    <input name='name' type="text" class="form-control" id="name" placeholder="ラクス太郎">
                </div>
                <div class="mb-3">
                    @foreach($errors->get('password') as $error)
                    <li style="color:red">{{$error}}</li>
                    @endforeach
                    <label for="password" class="form-label">pass word</label>
                    <input name="password" type="password" class="form-control" id="password">
                </div>
                <button>登録</button>
            </div>
        </form>
    </div>
</div>

@endsection