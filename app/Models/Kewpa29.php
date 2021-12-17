<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewpa29 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewpa29'];

    public function infokewpa29()
    {
        return $this->hasMany(InfoKewpa29::class);
    }
}
