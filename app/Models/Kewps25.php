<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps25 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewps25'];

    public function infokewps25()
    {
        return $this->hasMany(InfoKewps25::class);
    }
}
