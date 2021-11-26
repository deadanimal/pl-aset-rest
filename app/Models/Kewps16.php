<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps16 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewps16'];

    public function infokewps16()
    {
        return $this->hasMany(InfoKewps16::class);
    }
}
