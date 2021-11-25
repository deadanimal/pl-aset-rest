<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps11 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewps11'];

    public function infokewps11()
    {
        return $this->hasMany(InfoKewps11::class);
    }
}
