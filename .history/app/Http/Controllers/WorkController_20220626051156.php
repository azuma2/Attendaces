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

    
public function serch(Request $request)
    {
        $keyword = $request->input('keyword');
        $keyword2 = $request->input('keyword2');
        $gender2 = $request->input('gender2');
        $from = $request->input('from');
        $until = $request->input('until');

        $query = Timestamp::query();

        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('fname', 'LIKE', "%{$keyword}%");
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
            
        }

        $items = $query->get();
        $items = $query->paginate(10)->withQueryString();
        
        return view('infomation', compact('items', 'rests'));
    }

    
    public function infomation2(Request $request)
    {
        $user = Auth::user();
        $param = ['user' => $user];
        $rests = Rest::all();
        $items = Timestamp::all();
        return view('/infomation2', compact('rests','items','users'));
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
