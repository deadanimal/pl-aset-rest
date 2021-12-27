<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoKewpa36 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kewpa33'];

    public function kewpa33()
    {
        return $this->belongsTo(Kewpa33::class);
    }
}
