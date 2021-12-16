<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plpk_pa_0204 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $with = ['info_plpk_pa_0204', 'pemandu_ext'];

    public function info_plpk_pa_0204() {
      return $this->hasMany(InfoPlpk_pa_0204::class, 'plpk04_id');
    }

    public function pemandu_ext() {
      return $this->belongsTo(User::class, 'pemandu');
    }

}
