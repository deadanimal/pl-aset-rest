<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps23 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewps23'];

    public function infokewps23()
    {
        return $this->hasMany(InfoKewps23::class);
    }
}
