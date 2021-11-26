<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps7 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewps7'];

    public function infokewps7()
    {
        return $this->hasMany(InfoKewps7::class);
    }

}
