<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewpa25 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewpa25'];

    public function infokewpa25()
    {
        return $this->hasMany(InfoKewpa25::class);
    }
}
