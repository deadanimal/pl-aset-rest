<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jkrpataf612 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['blokbangunan', 'binaanluar', 'jkrpataf68'];

    public function blokbangunan()
    {
        return $this->hasMany(SenaraiBlokBangunan::class);
    }

    public function binaanluar()
    {
        return $this->hasMany(SenaraiBinaanLuar::class);
    }

    public function jkrpataf68()
    {
        return $this->belongsTo(Jkrpataf68::class);
    }
}
