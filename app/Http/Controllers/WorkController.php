<?php

namespace App\Http\Controllers;

use App\Models\Attendace;
use App\Models\Rest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WorkController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $param = [ 'user' =>$user];
        return view('index', $param);

    }



}