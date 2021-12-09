<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps24 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewps24'];

    public function infokewps24()
    {
        return $this->hasMany(InfoKewps24::class);
    }
}
