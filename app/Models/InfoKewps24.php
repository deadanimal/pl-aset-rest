<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoKewps24 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kewps23'];

    public function kewps23()
    {
        return $this->belongsTo(Kewps23::class);
    }

}
