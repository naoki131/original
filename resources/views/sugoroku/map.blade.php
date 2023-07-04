@extends('layouts.app')

@section('content')

<div class="m-5">
    <div>
        <h1>すごろく</h1>
        <div>
            <x-alert type="success" :session="session('success')" />
        </div>
      
        <form action="{{route('roleDice',$preservationId)}}" method="post">
            @csrf
            <button>サイコロを振る</button>

            <input type="hidden" name="playMemberId" value="{{$playMember->id}}">

        </form>
        
    </div>
    <p>参加メンバー({{count($members)}})</p>
    @foreach($members as $member)
    <p>{{$member->member_name}}残り{{40-$member->position}}マス</p>
    @endforeach
</div>
<div class="text-center">
    <h2><strong style="color:red">{{$playMember->member_name}}のターンです</strong></h2>
        <div class="row row-cols-6  g-3">
            @for($i=1;$i<=40;$i++) <div class="card m-3 col">
                <div class="card-body">
                    <p class="card-text">{{$i}}マス目</p>
                    @foreach($members as $member)
                    @if($member->position==$i)
                    <p class="card-text" style="color:green">{{$member->member_name}}</p>
                    @endif
                    @endforeach
                </div>

        </div>
        @endfor

</div>
<a href="{{route('home')}}">ホームに戻る</a>
</div>

@endsection