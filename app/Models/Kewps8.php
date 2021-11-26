<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps8 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kewps3a'];

    public function kewps3a()
    {
        return $this->belongsTo(Kewps3a::class);
    }
}
