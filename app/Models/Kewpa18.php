<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewpa18 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewpa18'];

    public function infokewpa18()
    {
        return $this->hasMany(InfoKewpa18::class);
    }
}
