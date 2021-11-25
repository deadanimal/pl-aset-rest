<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps6 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kewps3a', 'infokewps1'];

    public function kewps3a()
    {
        return $this->belongsTo(Kewps3a::class);
    }

    public function infokewps1()
    {
        return $this->belongsTo(InfoKewps1::class, 'kewps3a_id', 'id');
    }
}
