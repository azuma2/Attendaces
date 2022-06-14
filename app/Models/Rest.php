<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attendace;

class Rest extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'attendace_id',
        'created_at',
        'updated_at',
        'start_time',
        'end_time',
        'date',
    ];

    
    public static $rules = array(
        'attendace_id' => 'required',
    );

    public function attendace(){ 
        return $this->belongsTo(Attendace::class);
    }

}
