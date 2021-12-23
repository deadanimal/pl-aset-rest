<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kewps3b extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['user', 'kewps3a'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kewps3a()
    {
        return $this->belongsTo(Kewps3a::class, 'no_transaksi');
    }
}
