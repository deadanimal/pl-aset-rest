<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps17 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewps17'];

    public function infokewps17()
    {
        return $this->hasMany(InfoKewps17::class);
    }
}
