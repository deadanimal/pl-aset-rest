<?php

namespace App\Models;

use App\Models\Kewpa1;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoKewpa1 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    #protected $with = ['kewpa1'];

    #public function kewpa1() {
    #  return $this->belongsTo(Kewpa1::class, 'rujukan_kewpa1_id');
    #}
}

