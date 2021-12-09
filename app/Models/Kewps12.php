<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps12 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kewps10'];

    public function kewps10()
    {
        return $this->belongsTo(Kewps10::class);
    }
}
