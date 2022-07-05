<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Rest extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'restIn', 'restOut'];

    protected $table = 'rest';

    public function user()
    {
        $this->belongsTo(User::class);
    }

}
