<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps15 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function infokewps15()
    {
        return $this->hasMany(InfoKewps15::all());
    }
}
