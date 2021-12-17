<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewpa24 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewpa24'];

    public function infokewpa24()
    {
        return $this->hasMany(InfoKewpa24::class);
    }
}
