<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewpa27 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewpa27'];

    public function infokewpa27()
    {
        return $this->hasMany(InfoKewpa27::class);
    }
}
