<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    // =========== RETURN RESPONSE JSON
    private function respJSON($data=null, $success){

        $statuscode = 0;

        $statuscode = $success ? 200 : 404;

        return response()->json([
            'success'=>$success,
            'data'=>$data,
        ], $statuscode);
    }

    public function getLastNIS(){
        $data = Siswa::orderBy('nis', 'DESC')->get('nis')->first();
        if ($data) return $data->nis+1; else return 1;
        //$this->respJSON($data, true);
    }

    public function showAll(){
        $data = Siswa::all();
        return $this->respJSON($data, true);
    }

    public function showSingle($nis){
        $data = Siswa::find($nis);
        return $this->respJSON($data, true);
    }

    public function insert(Request $req){

        // ============ VALIDASI
        $req->validate([
            // 'nis'=>'required', 
            'nama_siswa'=>'required', 
            'kelas'=>'required', 
            'status_lulus'=>'required', 
            'alamat'=>'required', 
            'jenis_kelamin'=>'required', 
            'tgl_lahir'=>'required', 
            'tempat_lahir'=>'required', 
            'no_telp'=>'required',
            'foto' => 'required|file|image|mimes:jpeg,png,gif,webp,jpg|max:2048'
        ]);

        // ===== MASUKIN SEMUA REQUEST KE MODEL BIAR SIMPEL INSERTNYA 
        $model = $req->all();

        // ============= AMBIL NIS TERAKHIR
        $lastNIS = $this->getLastNIS();
        $model['nis'] = $lastNIS;

        // ======= CEK FOTO
        if ($req->hasFile('foto')){
            $file = $req->file('foto');
            // $fileName = $file->getClientOriginalName();
            // $fileName = str_replace(' ', '', $fileName);
            // $test = $req->file('foto')->move('storage/image/', $fileName);
            $fileName = $req->file('foto')->store('public/image/');
            $fileName = str_replace('public', 'storage', $fileName);
            $model['foto'] = $fileName;
        }

        // dd($test);

        // ===== INSERT DATA BARU
        $data = Siswa::create($model);
        if ($data){
            return $this->respJSON($data, true);
        } else {
            return $this->respJSON('gagal buat data siswa', false);
        }
        
    }

    public function testphoto(Request $req){
        $data = $req->all();
        // $validation = $req->validate([
        //     'foto' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
        //     // multiple file uploads
        //     // 'photo.*' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
        // ]);
        // $image = $req->file('foto');
        // $images = 'daengweb-' . time() . '.' . $image->getClientOriginalExtension();
        // \Image::make($image)->resize(300, 200)->save(storage_path('app/uploads/' . $images));
        // return $images;
        // $file = $req->file('foto')->move('storage/image/', 'nama.jpg');
        if ($req->hasFile('foto')){
            $file = $req->file('foto');
            $fileName = $file->getClientOriginalName();
            $req->file('foto')->move('storage/image/', $fileName);
        }
        $data['foto'] = $fileName;
        // $req->input('foto') = $fileName;

        return $this->respJSON($data, true);
    }

    public function getfoto(){
        // return $contents = Storage::get('uploads/e9x5yfGdvqcOxgOXXyVGof78zvY0SSVjxaWBMqpq.png');
        // echo asset('storage/app/uploads/e9x5yfGdvqcOxgOXXyVGof78zvY0SSVjxaWBMqpq.png');
    }

    public function getnis(){
        $data = Siswa::get('nis');
        return $this->respJSON($data, true);
    }
}
