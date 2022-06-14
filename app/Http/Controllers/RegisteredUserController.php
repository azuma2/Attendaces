<?php

namespace App\Http\Controllers;

use App\Models\Attendace;
use App\Models\Rest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ClientRequest;

class RegisteredUserController extends Controller
{
    public function registerShow()
    {
        $items = User::all();
        $param = ['items' => $items];
        return view('/register', ['items' => $items]);
    }

        public function index2(Request $request)
    {
        return view('index', ['txt' => 'フォームを入力']);
    }
    public function post(ClientRequest $request)
    {
        return view('index', ['txt' => '正しい入力です']);
    }

public function verror()
    {
        return view('verror');
    }



}