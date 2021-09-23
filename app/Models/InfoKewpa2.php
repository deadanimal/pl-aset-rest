<?php

namespace App\Models;

use App\Models\Kewpa2;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoKewpa2 extends Model
{
    use HasFactory;
    public function kewpa2s() {
      return $this->belongsTo(kewpa2s::class);
    }

}
