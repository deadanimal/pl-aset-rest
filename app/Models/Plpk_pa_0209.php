<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plpk_pa_0209 extends Model
{
    use HasFactory;

    public $table = 'info_plpk_pa_0209s';
    protected $guarded = ['id'];

    protected $with = ['info_plpk_pa_0209'];

    public function info_plpk_pa_0209() {
      return $this->hasMany(InfoPlpk_pa_0209::class, 'plpk09_id');
    }

}
