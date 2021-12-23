<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewpa32 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewpa32'];

    public function infokewpa32()
    {
        return $this->hasMany(InfoKewpa32::class);
    }
}
