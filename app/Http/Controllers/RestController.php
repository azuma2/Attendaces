<?php

namespace App\Http\Controllers;

use App\Models\Attendace;
use App\Models\Rest;
use App\Models\User;
use App\Models\Timestamp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RestController extends Controller
{
    
    public function restIn()
    {
        $user = Auth::user();

        $oldRest = Rest::where('user_id', $user->id)->latest()->first();
        if ($oldRest) {
            $oldRestRestIn = new Carbon($oldRest->restIn);
            $oldRestDay = $oldRestRestIn->startOfDay();
        }

        $newRestDay = Carbon::today();


        $Rest = Rest::create([
            'user_id' => $user->id,
            'restIn' => Carbon::now(),
        ]);

        return redirect()->back()->with('my_status', '出勤打刻が完了しました');
    }

    public function restOut()
    {
        $user = Auth::user();
        $Rest = Rest::where('user_id', $user->id)->latest()->first();

        if( !empty($Rest->restOut)) {
            return redirect()->back()->with('error', '既に退勤の打刻がされているか、出勤打刻されていません');
        }
        $Rest->update([
            'restOut' => Carbon::now()
        ]);

        return redirect()->back()->with('my_status', '退勤打刻が完了しました');
    }
}
