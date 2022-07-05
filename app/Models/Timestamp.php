<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Timestamp extends Model
{
    protected $fillable = ['user_id', 'punchIn', 'punchOut'];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}