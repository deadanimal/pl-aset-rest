<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jkrpata92 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infojkrpata92'];

    public function infojkrpata92()
    {
        return $this->hasMany(InfoJkrpata92::class);
    }
}
