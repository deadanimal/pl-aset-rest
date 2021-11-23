<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewatk2 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['pg_penerima', 'info_kewatk2', 'kewatk1'];

    public function pg_penerima()
    {
        return $this->belongsTo(User::class, 'pegawai_penerima');
    }

    public function kewatk1()
    {
        return $this->belongsTo(Kewatk1::class, 'no_rujukan_atk1');
    }

    public function info_kewatk2() 
    {
      return $this->hasMany(InfoKewatk2::class, 'no_rujukan_atk2');
    }

}
