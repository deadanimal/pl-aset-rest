<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParasStok extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kewps3a()
    {
        return $this->belongsTo(Kewps3a::class);
    }
}
