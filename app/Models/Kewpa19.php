<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewpa19 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function infokewpa19()
    {
        return $this->hasMany(InfoKewpa19::class);
    }
}
