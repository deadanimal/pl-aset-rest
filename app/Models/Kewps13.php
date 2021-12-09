<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps13 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewps10', 'kewps3a'];

    public function infokewps10()
    {
        return $this->belongsTo(InfoKewps10::class);
    }

    public function kewps3a()
    {
        return $this->belongsTo(Kewps3a::class);
    }
}
