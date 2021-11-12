<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoKewps2 extends Model
{
    use HasFactory;
    protected $with = ['infokewps1'];

    public function infokewps1()
    {
        return $this->belongsTo(InfoKewps1::class);
    }
}
