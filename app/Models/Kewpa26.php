<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewpa26 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewpa26'];

    public function infokewpa26()
    {
        return $this->hasMany(InfoKewpa26::class);
    }
}
