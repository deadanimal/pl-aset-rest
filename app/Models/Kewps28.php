<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps28 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewps28'];

    public function infokewps28()
    {
        return $this->hasMany(InfoKewps28::class);
    }
}
