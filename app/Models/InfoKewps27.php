<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoKewps27 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kewps26'];

    public function kewps26()
    {
        return $this->belongsTo(Kewps26::class);
    }
}
