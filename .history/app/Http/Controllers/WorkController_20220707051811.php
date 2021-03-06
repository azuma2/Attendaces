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

$dt = Carbon::now();
echo $dt; // 2016-06-16 09:52:03


echo $dt->subDay(3);



        
        
    $rests = Rest::where('restIn', 'LIKE',"%{$request->input2}%")->get();



        $users = Auth::user();
        $rests = Rest::all();
        $items = Timestamp::where('punchIn', $request->$dt)->get();
        return view('/infomation', compact('rests','items','users','dt'));
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
            //????????????????????????????????????20xx/xx/xx ~ 20xx/xx/xx??????????????????????????????
            
            $query->whereBetween('updated_at', [$from, $until]);
        } else {
            //????????????????????????????????????????????????????????????
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
