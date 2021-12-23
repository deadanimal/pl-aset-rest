<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoKewpa15 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $with = ['kewpa3a'];
    public function kewpa3a() {
      return $this->belongsTo(Kewpa3A::class, 'no_siri_pendaftaran', 'no_siri_pendaftaran');
    }

}
