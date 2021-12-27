<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewpa36 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewpa36'];

    public function infokewpa36()
    {
        return $this->hasMany(InfoKewpa36::class);
    }
}
