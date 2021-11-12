<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kewps1 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewps1'];

    public function infokewps1()
    {
        return $this->hasMany(InfoKewps1::class);
    }
}
