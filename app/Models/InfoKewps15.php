<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoKewps15 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kewps3a', 'infokewps10'];

    public function kewps15()
    {
        return $this->belongsTo(Kewps15::class);
    }

    public function kewps3a()
    {
        return $this->belongsTo(Kewps3a::class);
    }

    public function infokewps10()
    {
        return $this->belongsTo(InfoKewps10::class);

    }
}
