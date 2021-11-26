<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps36 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewps36'];

    public function infokewps36()
    {
        return $this->hasMany(InfoKewps36::class);
    }
}
