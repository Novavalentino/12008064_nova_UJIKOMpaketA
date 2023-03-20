<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';
    protected $fillable = ['judul_laporan', 'tgl_pengaduan', 'nik', 'isi_laporan', 'foto', 'status'];
    public function masyarakat(){
        return $this->hasOne('App\Models\Masyarakat', 'id', 'id');
    }
    
}
