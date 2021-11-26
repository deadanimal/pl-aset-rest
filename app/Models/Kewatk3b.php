<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewatk3b extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['kewatk3a'];

    public function kewatk3a()
    {
        return $this->belongsTo(Kewatk3a::class, 'no_siri_pendaftaran');
    }

}
