<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewatk4 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['info_kewatk4'];

    public function info_kewatk4() 
    {
      return $this->hasMany(InfoKewatk4::class, 'kewatk4_id');
    }


}
