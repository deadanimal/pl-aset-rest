<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoKewatk10 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kewatk10'];

    public function kewatk10() {
      return $this->belongsTo(Kewatk10::class, 'tahun_semasa', 'tahun');
    }

}
