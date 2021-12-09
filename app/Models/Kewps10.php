<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps10 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $with = ['infokewps10'];

    public function infokewps10()
    {
        return $this->hasMany(InfoKewps10::class);
    }
}
