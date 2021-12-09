<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps9 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewps7'];

    public function infokewps7()
    {
        return $this->belongsTo(InfoKewps7::class);
    }
}
