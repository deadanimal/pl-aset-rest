<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jkrpataf69 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['jkrpataf68'];

    public function jkrpataf68()
    {
        return $this->belongsTo(Jkrpataf68::class);
    }
}
