<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewpa17 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewpa17'];

    public function infokewpa17()
    {
        return $this->hasMany(InfoKewpa17::class, 'no_permohonan_kewpa17');
    }
}
