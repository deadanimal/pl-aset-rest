<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps20 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewps20'];

    public function infokewps20()
    {
        return $this->hasMany(InfoKewps20::class);
    }
}
