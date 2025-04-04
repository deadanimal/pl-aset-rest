<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewatk19 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['info_kewatk19'];

    public function info_kewatk19() {
      return $this->hasMany(InfoKewatk19::class, 'kewatk19_id');

    }
}
