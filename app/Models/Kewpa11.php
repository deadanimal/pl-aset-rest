<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewpa11 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['info_kewpa11'];

    public function info_kewpa11() 
    {
      return $this->hasMany(InfoKewpa11::class, 'rujukan_kewpa11_id');
    }

}
