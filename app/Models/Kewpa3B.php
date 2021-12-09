<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewpa3B extends Model
{
    public $table = 'kewpa3bs';
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['pg_bertanggungjawab', 'kewpa3a'];

    public function pg_bertanggungjawab() {
      return $this->belongsTo(User::class, 'pegawai_bertanggungjawab');
    }

    public function kewpa3a() {
      return $this->belongsTo(Kewpa3A::class, 'no_siri_pendaftaran');
    }



}
