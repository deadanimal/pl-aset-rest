<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewps3a extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['parasstok', 'terima', 'keluar'];

    public function parasstok()
    {
        return $this->hasMany(ParasStok::class);
    }

    public function terima()
    {
        return $this->hasMany(TerimaanStokSukuTahun::class);
    }

    public function keluar()
    {
        return $this->hasMany(KeluaranStokSukuTahun::class);
    }
}
