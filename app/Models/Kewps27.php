<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps27 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewps27'];

    public function infokewps27()
    {
        return $this->hasMany(InfoKewps27::class);
    }
}
