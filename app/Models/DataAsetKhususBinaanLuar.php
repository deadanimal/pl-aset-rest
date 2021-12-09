<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAsetKhususBinaanLuar extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['perunding', 'kontraktor'];

    public function perunding()
    {
        return $this->hasMany(PerundingLuarPremis::class);
    }

    public function kontraktor()
    {
        return $this->hasMany(KontraktorLuarPremis::class);
    }
}
