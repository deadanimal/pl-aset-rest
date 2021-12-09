<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jkrpataf610 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infojkrpataf610'];

    public function infojkrpataf610()
    {
        return $this->hasMany(InfoJkrpataf610::class);
    }
}
