<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps18 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kewps17'];

    public function kewps17()
    {
        return $this->belongsTo(Kewps17::class);
    }

}
