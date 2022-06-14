<?php

namespace App\Http\Controllers;

use App\Models\Attendace;
use App\Models\Rest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ClientRequest;

class AuthorController extends Controller
{
    public function check(Request $request)
    {
    $text = ['text' => 'ログインして下さい。'];
    return view('auth', $text);
    }

    public function checkUser(Request $request)
    {
    $email = $request->email;
    $password = $request->password;
    $user = $request->Auth::user()->all;
    if (Auth::attempt(['email' => $email,
            'password' => $password])) {
        $text =   Auth::user()->name . 'さんがログインしました';
    } else {
        $text = 'ログインに失敗しました';
    }
    return view('index', ['text' => $text,$user]);
    }

        public function check2(Request $request)
    {
    $text = ['text' => '登録をお願いします。'];
    return view('auth2', $text);
    }

    public function checkUser2(Request $request)
    {
    $name = $request->name;
    $email = $request->email;
    $password = $request->password;
    $ConfirmPassword = $request->ConfirmPassword;
    
    return view('index');
    }

}