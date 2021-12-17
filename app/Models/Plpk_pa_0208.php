<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plpk_pa_0208 extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['info_plpk_pa_0208'];

    public function info_plpk_pa_0208() {
      return $this->hasMany(InfoPlpk_pa_0208::class, 'plpk08_id');
    }

}
