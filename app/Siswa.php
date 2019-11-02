<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';

    protected $primaryKey = 'nis';

    protected $fillable = [
        'nis', 'nama_siswa', 'kelas', 'status_lulus', 'alamat', 'jenis_kelamin', 
        'tgl_lahir', 'tempat_lahir', 'no_telp', 'email', 'foto'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

}
