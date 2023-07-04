@extends('layouts.app')

@section('content')

<div class="m-5">
    <div>
        <div>
            <h1>すごろく</h1>
            <div>

                <x-alert type="success" :session="session('success')" />
                <label for="new">新しく始める</label><input type="radio" name="selectGame" id="new">
                <label for="continue">続きから始める</label><input type="radio" name="selectGame" id="continue">
            </div>
            <div>
                <form action="{{route('registerMember')}}" method="post">
                    @csrf
                    <div><label for="numberPeople">人数</label><input type="number" name="numberPeople" id="numberPeople" min="1" max="6">人</div>
                    <div><label for="name">名前：</label><input type="text" name="name1" id="name1"></div>
                    <div><label for="name">名前：</label><input type="text" name="name2" id="name2"></div>
                    <div><label for="name">名前：</label><input type="text" name="name3" id="name3"></div>
                    <div><label for="name">名前：</label><input type="text" name="name4" id="name4"></div>
                    <div><label for="name">名前：</label><input type="text" name="name5" id="name5"></div>
                    <div><label for="name">名前：</label><input type="text" name="name6" id="name6"></div>
                    <div><label for="name">セーブタイトル</label><input type="text" name="title" id="title"></div>
                    <button>スタート</button>
                </form>
            </div>
            <hr>
            <div class="card m-5">
                <div class="card-body">
                    <h2>新しいマスを作る</h2>
                    <div>
                        <div>
                            <form action="{{route('registerSpace')}}" method="post">
                                @csrf
                                <div><label for="comment">ストーリー：</label><textarea id="comment" name="comment" cols="40"></textarea></div>
                                <div><label for="rest">STOP</label><input type="number" name="rest" id="rest" min="0" max="3">回休み(最大で３回)</div>
                                <div><label for="money_flow">お金の動き</label><input type="number" name="money_flow" id="money_flow">円</div>
                                <div><label for="move">位置の移動</label><input type="number" name="move" id="move">マス移動する（-の場合は戻る）</div>
                                <button>登録</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection