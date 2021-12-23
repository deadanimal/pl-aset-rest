<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoKewpa25 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewpa24'];

    public function infokewpa24()
    {
        return $this->belongsTo(InfoKewpa24::class, 'no_tender');
    }
}
