<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewatk21 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['hadiah_kepada'];

    public function hadiah_kepada()
    {
        return $this->belongsTo(User::class, 'dihadiahkan_kepada');
    }

}
