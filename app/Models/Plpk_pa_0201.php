<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plpk_pa_0201 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['pg_terakhir'];

    public function pg_terakhir() {
      return $this->belongsTo(User::class, 'pengguna_terakhir');
    }
}
