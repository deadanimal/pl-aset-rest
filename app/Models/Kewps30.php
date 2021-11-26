<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps30 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kewps29', 'kewps3a'];

    public function kewps29()
    {
        return $this->belongsTo(Kewps29::class);
    }

    public function kewps3a()
    {
        return $this->belongsTo(Kewps3a::class);
    }
}
