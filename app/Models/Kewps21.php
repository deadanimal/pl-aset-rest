<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps21 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewps21'];

    public function infokewps21()
    {
        return $this->hasMany(InfoKewps21::class);
    }

}
