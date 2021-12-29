<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SenaraiBlokBangunan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['gambarblok', 'dataasetkhusus'];

    public function jkrpataf612()
    {
        return $this->belongsTo(Jkrpataf612::class);
    }

    public function gambarblok()
    {
        return $this->hasMany(Gambarblok::class);
    }

    public function dataasetkhusus()
    {
        return $this->hasOne(DataAsetKhusus::class, 'blok_bangunan_id');
    }
}
