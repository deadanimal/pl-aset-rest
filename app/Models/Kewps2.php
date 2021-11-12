<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps2 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kewps1'];

    public function kewps1()
    {
        return $this->belongsTo(kewps1::class);
    }

}
