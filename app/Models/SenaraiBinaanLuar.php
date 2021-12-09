<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SenaraiBinaanLuar extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function jkrpataf612()
    {
        return $this->belongsTo(Jkrpataf612::class);
    }

    public function gambarbinaanluar()
    {
        return $this->hasMany(Gambarbinaanluar::class);
    }

    public function dataasetkhususbl()
    {
        return $this->hasMany(DataAsetKhususBinaanLuar::class);
    }

}
