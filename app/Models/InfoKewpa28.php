<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoKewpa28 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['infokewpa27'];

    public function infokewpa27()
    {
        return $this->belongsTo(InfoKewpa27::class, 'kewpa27_id');
    }
}
