<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoKewatk2 extends Model
{

    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['info_kewatk1'];

    public function info_kewatk1()
    {
        return $this->belongsTo(InfoKewatk1::class, 'no_kod');
    }

}
