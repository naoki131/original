@extends('layouts.app')

@section('content')
<div class="text-center m-5" >
    <h1>ログインフォーム</h1>

    <x-alert type="danger" :session="session('danger')"/>
   
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
@endsection