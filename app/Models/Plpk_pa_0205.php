<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plpk_pa_0205 extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['pemandu_ext'];

    public function pemandu_ext() {
      return $this->belongsTo(User::class, 'pemandu');
    }

}
