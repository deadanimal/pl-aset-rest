<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewatk25 extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['pg_penyelia','pg_langsung','pg_bertanggungjawab','kewatk23'];

    public function pg_penyelia()
    {
        return $this->belongsTo(User::class, 'pegawai_penyelia');
    }

    public function pg_langsung()
    {
        return $this->belongsTo(User::class, 'pegawai_langsung');
    }

     public function pg_bertanggungjawab()
    {
        return $this->belongsTo(User::class, 'pegawai_bertanggungjawab');
    }

    public function kewatk23()
    {
        return $this->belongsTo(Kewatk23::class);
    }

}
