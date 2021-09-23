<?php

namespace App\Models;

use App\Models\Kewpa1;
use App\Models\InfoKewpa2;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewpa2 extends Model
{
    use HasFactory;
    public function kewpa1() {
      return $this->belongsTo(Kewpa1::class);
    }

    public function info_kewpa2s() {
      return $this->hasMany(InfoKewpa2::class);
    }


}
