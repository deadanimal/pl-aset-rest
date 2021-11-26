<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoKewps36 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewps35', 'kewps34', 'kewps3a'];

    public function infokewps35()
    {
        return $this->belongsTo(InfoKewps35::class);
    }

    public function kewps34()
    {
        return $this->belongsTo(Kewps34::class);
    }

    public function kewps3a()
    {
        return $this->belongsTo(Kewps3a::class);
    }
}
