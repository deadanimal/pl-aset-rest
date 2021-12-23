<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewpa9 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['info_kewpa9', 'pemohon_ext'];

    public function info_kewpa9() 
    {
      return $this->hasMany(InfoKewpa9::class, 'kewpa9_id');
    }

    public function pemohon_ext() 
    {
      return $this->belongsTo(User::class, 'pemohon_id');

    }

}
