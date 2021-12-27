<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoKewps20 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kewps3a', 'kaedahPelupusans'];

    public function kewps3a()
    {
        return $this->belongsTo(Kewps3a::class);
    }

    public function kewps20()
    {
        return $this->belongsTo(Kewps20::class);
    }

    public function kaedahPelupusans()
    {
        return $this->belongsTo(KaedahPelupusan::class, 'kaedah_pelupusan', 'value');
    }
}
