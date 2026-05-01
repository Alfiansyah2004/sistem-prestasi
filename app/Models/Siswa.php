<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = [
        'nis', 'nama', 'jenis_kelamin',
        'tempat_lahir', 'tanggal_lahir',
        'alamat', 'foto', 'kelas_id'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function prestasi()
    {
        return $this->hasMany(Prestasi::class);
    }
}