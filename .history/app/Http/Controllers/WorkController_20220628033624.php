<?php

namespace App\Http\Controllers;

use App\Models\Attendace;
use App\Models\Rest;
use App\Models\User;
use App\Models\Timestamp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Date;

class WorkController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $param = ['user' => $user];
        return view('index', $param);
    }

    public function infomation()
    {
        $users = Auth::user();
        $param = ['user' => $users];
        $rests = Rest::all();

        $items = Timestamp::all();
        $items = Timestamp::Paginate(2);



        return view('/infomation', compact('rests','items','users'));
    }

    
    public function move1(Request $request)
    {
        $items = Timestamp::where('punchIn', $request->input)->get();
        $param = [
            'input' => $request->input,
            'item' => $items
        ];
        return view('/index', $param);
    }





    
    public function move(Request $request)
    {
        $carbon = Carbon::now();
        
        $carbon->subDays(3)->format("Y-m-d");
        echo $carbon . PHP_EOL;



var cnt = 0;

//「月/日」を取得＆表示する関数 showMonthDate を定義
function showMonthDate(){
    //「今(今日)」の Date オブジェクトを作成
    var nowDate = new Date();
    // cnt 週間後の Date オブジェクトを作成
    var myDate = new Date(nowDate.getTime() + 604800000*cnt);
    //月や日を２桁の文字列で取得
    var mm = ("0"+(myDate.getMonth()+1)).slice(-2);
    var dd = ("0"+(myDate.getDate())).slice(-2);
    //「date_txt」に「月/日」を表示
    document.getElementById("date_txt").value = mm+"/"+dd;
}

//関数 showMonthDate を即実行
showMonthDate();

//[←前の週]ボタンクリック時のイベントハンドラメソッドを定義
document.getElementById("back_btn").onclick = function(){
    //カウンタをカウントダウンする
    cnt--;
    //関数 showMonthDate を実行
    showMonthDate();
}

//[次の週→]ボタンクリック時のイベントハンドラメソッドを定義
document.getElementById("next_btn").onclick = function(){
    //カウンタをカウントアップする
    cnt++;
    //関数 showMonthDate を実行
    showDayDate();
}
        
        
    $rests = Rest::where('restIn', 'LIKE',"%{$request->input2}%")->get();



        $users = Auth::user();
        $rests = Rest::all();
        $items = Timestamp::where('punchIn', $request->$carbon)->get();
        return view('/infomation2', compact('rests','items','users'));
    }


    public function serch(Request $request)
    {
    $items = Timestamp::where('punchIn', 'LIKE',"%{$request->input}%")->get();
    $rests = Rest::where('restIn', 'LIKE',"%{$request->input2}%")->get();
    $param = [
            'input' => $request->input,
            'item' => $items,
            
        ];


        


        return view('infomation2', compact('items','rests'));
    }


public function serch2(Request $request)
    {
        $keyword = $request->input('keyword');
        $keyword2 = $request->input('keyword2');
        $gender2 = $request->input('gender2');
        $from = $request->input('from');
        $until = $request->input('until');
        $time = $request->input('time');

        $query = Timestamp::query();
        $query = Rest::query();
        $query = User::query();

        if(!empty($keyword)) {
            $query = Timestamp::where('punchIn', $request->input);
            
        }

        if(!empty($keyword2)) {
            $query->where('email', 'LIKE', "%{$keyword2}%");
        }

        if(!empty($gender2)) {
            $query->where('gender', 'LIKE', "%{$gender2}%");
        }

        if (!empty($from) && !empty($until)) {
            //ハッシュタグの選択された20xx/xx/xx ~ 20xx/xx/xxのレポート情報を取得
            
            $query->whereBetween('updated_at', [$from, $until]);
        } else {
            //リクエストデータがなければそのままで表示
            $item = Timestamp::get();
            $rest = Rest::get();
            $user = User::get();
        }

        $items = $query->get();
        $rests = $query->get();
        $users = $query->get();
        $items = $query->paginate(10)->withQueryString();
        
        return view('infomation', compact('items', 'rests', 'users'));
    }

    
    public function infomation2(Request $request)
    {
        $users = Auth::user();
        $rests = Rest::all();
        $items = Timestamp::all();
        return view('/infomation2', compact('items','rests','users'));
    }

     public function bind(rest $rest)
    {
        $data = [
            'item'=>$rest,
        ];
        return view('rest.binds', $data);
    }

    
    public function infomation3()
    {
        $user = Auth::user();
        $param = ['user' => $user];
        $items = Rest::all();
        $items = Timestamp::all();
        $items = Auth::user();
        return view('/infomation3', compact('items'));
    }
}
