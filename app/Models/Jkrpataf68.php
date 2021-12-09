<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jkrpataf68 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['datatanah'];

    public function datatanah()
    {
        return $this->hasMany(DataTanah::class);
    }
}
