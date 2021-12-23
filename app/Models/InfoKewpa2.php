<?php

namespace App\Models;

use App\Models\Kewpa2;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoKewpa2 extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['info_kewpa1'];

    public function info_kewpa1() {
      return $this->belongsTo(InfoKewpa1::class, 'info_kewpa1_id');
    }


}
