<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewpa31 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kewpa30'];

    public function kewpa30()
    {
        return $this->belongsTo(Kewpa30::class);
    }
}
