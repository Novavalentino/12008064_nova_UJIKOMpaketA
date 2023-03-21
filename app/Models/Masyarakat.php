<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;
// use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    use HasFactory;
    protected $table="masyarakat";
    protected $fillable=['nik', 'nama', 'username', 'password', 'kelamin', 'alamat', 'telp',];

    public function pengaduan(){
        return $this->hasMany('App\Models\Pengaduan', 'id_pengaduan', 'id_pengaduan');
    }
}
