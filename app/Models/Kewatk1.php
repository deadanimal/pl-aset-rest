<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewatk1 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['pg_pakar', 'pg_penerima', 'info_kewatk1'];

    public function pg_pakar()
    {
        return $this->belongsTo(User::class, 'pegawai_pakar');
    }

    public function pg_penerima()
    {
        return $this->belongsTo(User::class, 'pegawai_penerima');
    }

    public function info_kewatk1() 
    {
      return $this->hasMany(InfoKewatk1::class, 'no_rujukan');
    }



}
