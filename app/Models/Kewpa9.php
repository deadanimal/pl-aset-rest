<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewpa9 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['info_kewpa9'];

    public function info_kewpa9() 
    {
      return $this->hasMany(InfoKewpa9::class, 'kewpa9_id');
    }

}
