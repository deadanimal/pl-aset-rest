<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewatk9 extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['info_kewatk9'];

    public function info_kewatk9() {
      return $this->hasMany(InfoKewatk9::class, 'no_rujukan_atk9');
    }

}
