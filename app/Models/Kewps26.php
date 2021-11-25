<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps26 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewps26'];

    public function infokewps26()
    {
        return $this->hasMany(InfoKewps26::class);
    }
}
