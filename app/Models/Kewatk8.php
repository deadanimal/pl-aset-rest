<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewatk8 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kewatk3a', 'pg_terakhir', 'pg_pengadu'];

    public function kewatk3a() {
      return $this->belongsTo(Kewatk3a::class, 'no_siri_pendaftaran', 'no_siri_pendaftaran');
    }

    public function pg_terakhir() {
      return $this->belongsTo(User::class, 'pengguna_terakhir');
    }

    public function pg_pengadu() {
      return $this->belongsTo(User::class, 'pengadu');
    }



}
