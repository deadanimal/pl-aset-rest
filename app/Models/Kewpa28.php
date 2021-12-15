<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewpa28 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewpa28'];

    public function infokewpa28()
    {
        return $this->hasMany(InfoKewpa28::class);
    }
}
