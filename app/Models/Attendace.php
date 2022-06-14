<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Rest;

class Attendace extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'created_at',
        'updated_at',
        'start_time',
        'end_time',
        'date',
    ];

    
    public static $rules = array(
        'user_id' => 'required',
    );

    public function user(){ 
        return $this->belongsTo(User::class);
    }

    
    public function rest(){ 
        return $this->belongsTo(Rest::class);
    }

}
