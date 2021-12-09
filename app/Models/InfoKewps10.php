<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoKewps10 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kewps3a', 'kewps10'];

    public function kewps3a()
    {
        return $this->belongsTo(Kewps3a::class);
    }
    public function kewps10()
    {
        return $this->belongsTo(Kewps10::class);
    }

}
