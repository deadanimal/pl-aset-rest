<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plpk_pa_0203 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $with = ['info_plpk_pa_0203', 'pembaiki_disyorkan_ext', 'pg_penyelenggaraan_ext'];

    public function info_plpk_pa_0203() {
      return $this->hasMany(InfoPlpk_pa_0203::class, 'plpk03_id');
    }

    public function pembaiki_disyorkan_ext() {
      return $this->belongsTo(User::class, 'pembaiki_disyorkan');
    }

    public function pg_penyelenggaraan_ext() {
      return $this->belongsTo(User::class, 'pegawai_penyelenggaraan');
    }


}
