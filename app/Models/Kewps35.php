<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps35 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewps35'];

    public function infokewps35()
    {
        return $this->hasMany(InfoKewps35::class);
    }
}
