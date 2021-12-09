<?php

namespace App\Models;

use App\Models\Kewpa1;
use App\Models\InfoKewpa2;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewpa2 extends Model
{


    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['info_kewpa2', 'kewpa1'];

    public function info_kewpa2() {
      return $this->hasMany(InfoKewpa2::class, 'rujukan_kewpa2');
    }

    public function kewpa1() {
      return $this->belongsTo(Kewpa1::class, 'rujukan_kewpa1_id');
    }

}
