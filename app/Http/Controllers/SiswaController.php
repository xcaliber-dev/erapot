<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    private function respJSON($data=null, $success){

        $statuscode = 0;

        $statuscode = $success ? 200 : 404;

        return response()->json([
            'success'=>$success,
            'data'=>$data,
        ], $statuscode);
    }

    public function showAll(){
        $data = Siswa::all();
        return $this->respJSON($data, true);
    }

    public function showSingle($nis){
        $data = Siswa::find($nis);
        return $this->respJSON($data, true);
    }
}
