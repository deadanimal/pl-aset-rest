<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewatk7 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['info_kewatk7', 'nama_lokasi', 'pg_pemohon', 'pg_penerima'];

    public function info_kewatk7() 
    {
      return $this->hasMany(InfoKewatk7::class, 'no_permohonan_atk7');
    }

    public function nama_lokasi() 
    {
      return $this->belongsTo(KodLokasi::class, 'kod_lokasi');
    }

    public function pg_pemohon() 
    {
      return $this->belongsTo(User::class, 'pemohon');
    }

    public function pg_penerima() 
    {
      return $this->belongsTo(User::class, 'penerima');
    }






}
