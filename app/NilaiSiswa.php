<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiSiswa extends Model
{
    protected $table = 'nilai_siswas';

    protected $primaryKey = 'nis';

    protected $fillable = [
        'mtk', 'ipa', 'ips'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
