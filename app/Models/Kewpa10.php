<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewpa10 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kewpa3a', 'pg_terakhir'];

    public function kewpa3a() {
      return $this->belongsTo(Kewpa3A::class, 'no_siri_pendaftaran', 'no_siri_pendaftaran');
    }

    public function pg_terakhir() {
      return $this->belongsTo(User::class, 'pengguna_terakhir');
    }


}
