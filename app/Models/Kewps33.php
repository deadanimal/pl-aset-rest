<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps33 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kewps32'];

    public function kewps32()
    {
        return $this->belongsTo(Kewps32::class);
    }
}
