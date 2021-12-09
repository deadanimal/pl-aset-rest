<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps31 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewps31'];

    public function infokewps31()
    {
        return $this->hasMany(InfoKewps31::class);
    }
}
