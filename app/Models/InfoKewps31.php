<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoKewps31 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kewps20'];

    public function kewps20()
    {
        return $this->belongsTo(Kewps20::class);
    }
}
