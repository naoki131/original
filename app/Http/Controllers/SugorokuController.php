<?php

namespace App\Http\Controllers;

use App\Models\Models\Preservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Models\Member;
use App\Models\Models\Space;
use Illuminate\Support\Facades\Auth;

class SugorokuController extends Controller
{
    //すごろくのトップ画面
    public function showSugoroku()
    {
        return view('sugoroku.start');
    }
    //すごろくのメンバー登録
    public function registerMember(Request $request)
    {
        //セーブデータを作る。
        $preservation = new Preservation();
        $preservation->user_id = Auth::id();
        $preservation->preservation_date = Carbon::now();
        $preservation->title = $request->input('title');
        $preservation->save();
        session()->put('na','aaa');
        //メンバーの登録
        for ($i = 1; $i <= 6; $i++) {
            session()->put('ba',$i);
            session()->put('ca','name'.$i);


            if ($request->filled('name'.$i)) {
                $member = new Member();
                $member->preservation_id = $preservation->id;
                $member->member_name = $request->input('name'.$i);
                $member->order = $i;
                $member->save();
            }
        }
        return redirect()->route('showMap',$preservation->id);

    }
    //すごろくのマスを作成
    public function registerSpace(Request $request)
    {
        $space = new Space();
        $space->comment =$request->input('comment');
        $space->move =$request->input('move');
        $space->rest =$request->input('rest');
        $space->money_flow =$request->input('money_flow');
        $space->save();

        return redirect()->back()->with('success','1件のマスの作成が完了いたしました。');


    }
    //すごろく画面の出力
    public function showMap($preservationId)
    {
        $preservation=Preservation::where('id',$preservationId)->first();
        $members = Member::where('preservation_id',$preservationId)->get();
        $playMember = $members->where('order',1)->first();
        $spaces = Space::all();
       
        
        return view('sugoroku.map',compact('members','playMember','spaces','preservationId'));
    }

    public function roleDice(Request $request,$preservationId)
    {
        //サイコロを回すメンバーの特定
        $members = Member::where('preservation_id',$preservationId)->get();
        $playMember = $members->where('id',$request->input('playMemberId'))->first();
               
        //ほかのプレイヤーの順番を1つ進めている。
        for($i=2;$i<=count($members);$i++)
        {
            $waitMember =$members->where('order',$i)->first();
            //ここは変える
            //
          
            $waitMember->order -=1;
            $waitMember->save();
        }
        //サイコロを回す
        $dicePoint =rand(1,6);
        $playMember->position += $dicePoint;
        //ゴールを通過したら、ゴール地点でストップして、ステータスを変更する。
        if($playMember->position>=40)
        {
            $playMember->position=40;
            $playMember->finish =1;
        }
        
        $playMember->order  =count($members);
        $playMember->save();

        if(is_null($members->where('finish',0)->first()))
        {
            return view('sugoroku.finish');
        }

        return redirect()->back()->with('success',$playMember->member_name.'がサイコロで'.$dicePoint.'を出した。');       

    }


}
