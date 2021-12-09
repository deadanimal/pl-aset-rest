<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAsetKhusus extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['blokbangunan', 'maklumataras'];

    public function blokbangunan()
    {
        return $this->belongsTo(SenaraiBlokBangunan::class, 'blok_bangunan_id');
    }
    public function kontraktor()
    {
        return $this->hasMany(KontraktorBangunan::class);
    }
    public function perunding()
    {
        return $this->hasMany(PerundingBangunan::class);
    }
    public function maklumataras()
    {
        return $this->hasMany(MaklumatAras::class);
    }
}
