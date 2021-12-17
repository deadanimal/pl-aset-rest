<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewpa15 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kewpa3a', 'info_kewpa15'];

    public function kewpa3a() {
      return $this->belongsTo(Kewpa3A::class, 'no_siri_pendaftaran', 'no_siri_pendaftaran');
    }

    public function info_kewpa15() 
    {
      return $this->hasMany(InfoKewpa15::class, 'kewpa15_id');
    }

}
