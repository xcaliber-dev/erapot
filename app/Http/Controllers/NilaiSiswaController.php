<?php

namespace App\Http\Controllers;

use App\NilaiSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiSiswaController extends Controller
{
    private function respJSON($data=null, $success){

        $statuscode = 0;

        $statuscode = $success ? 200 : 404;

        return response()->json([
            'success'=>$success,
            'data'=>$data,
        ], $statuscode);
    }

    public function semua(){
        $data = NilaiSiswa::all();
        return $this->respJSON($data, true);
    }

    public function test($nis){
        $data = DB::select('SELECT siswas.nis, siswas.nama_siswa, mtk, ipa, ips FROM nilai_siswas INNER JOIN siswas ON siswas.nis = nilai_siswas.nis WHERE nilai_siswas.nis = "'.$nis.'"');
        return $this->respJSON($data, true);
    }
}
