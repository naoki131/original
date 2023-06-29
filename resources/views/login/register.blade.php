@extends('layouts.app')

@section('content')

<div >
    <div class="card m-5">
    <form action="route{{('register')}}" method="post">
        <div class="card-body">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">ユーザーネーム</label>
            <input type="text" class="form-control" id="name" placeholder="ラクス太郎">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">pass word</label>
            <input type="password" class="form-control" id="password">
        </div>
        <button>登録</button>
        </div>
    </form>
</div>
</div>

@endsection