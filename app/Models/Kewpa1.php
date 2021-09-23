<?php

namespace App\Models;


use App\Models\InfoKewpa1;
use App\Models\Kewpa2;
use App\Models\Kewpa3;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewpa1 extends Model
{
    public $table = 'kewpa1';
    use HasFactory;

    public function info_kewpa1s() {
      return $this->hasMany(InfoKewpa1::class);
    }

    public function kewpa2s() {
      return $this->hasMany(Kewpa2::class);
    }

    public function kewpa3as() {
      return $this->hasMany(Kewpa3A::class);
    }



    
}
