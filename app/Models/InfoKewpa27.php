<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoKewpa27 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewpa21'];

    public function infokewpa21()
    {
        return $this->belongsTo(InfoKewpa21::class, 'kewpa21_id');
    }
}
