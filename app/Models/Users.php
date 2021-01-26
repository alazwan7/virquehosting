<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\LinesOfCode\Counter;

class Users extends Model
{
    use HasFactory;
    public function request()
    {
        return $this->hasMany(Request::class);
    } 

    public function counter()
    {
        return $this->belongsTo(Counters::class);
    }
}
