<?php

namespace App\Models;


use App\Models\InfoKewpa1;
use App\Models\Kewpa2;
use App\Models\Kewpa3;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewpa1 extends Model
{
    public $table = 'kewpa1s';
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['info_kewpa1'];

    public function info_kewpa1() {
      return $this->hasMany(InfoKewpa1::class, 'rujukan_kewpa1_id');
    }


    
}
