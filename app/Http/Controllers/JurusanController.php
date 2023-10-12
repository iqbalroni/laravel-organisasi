<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\JurusanModel;
use SweetAlert;

class JurusanController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->JurusanModel = new JurusanModel;
    }

    public function index(){
        $data = [
            'jurusan' => $this->JurusanModel->AllJurusan(),
        ];
        return view('jurusan.v_jurusan',$data);

    }

    public function tambah(){
        return view('jurusan.v_addjurusan');
    }

    public function simpan(){
        request()->validate([
            'jurusan' => 'required',
            'tingkat' => 'required'
        ],[
            'jurusan.required' => 'Jurusan wajib diisi',
            'tingkat.required' => 'Jurusan wajib diisi',
        ]);

        $data = [
            'jurusan' => Request()->jurusan,
            'tingkat' => Request()->tingkat,
        ];

        $this->JurusanModel->TambahData($data);

        alert()->success('Data berhasil di tambah', 'Berhasil!');

        return redirect()->route('jurusan');
    }

    public function hapus($id){
        $this->JurusanModel->HapusData($id);

        alert()->Success('Data berhasil di hapus', 'Berhasil!');
        return redirect()->route('jurusan');
    }

    public function edit($id){
        $data = [
            'Show' => $this->JurusanModel->DetailData($id),
        ];
        return view('jurusan.v_editjurusan',$data);
    }

    public function saveedit($id){
        request()->validate([
            'jurusan' => 'required',
            'tingkat' => 'required'
        ],[
            'jurusan.required' => 'Jurusan wajib diisi',
            'tingkat.required' => 'Jurusan wajib diisi',
        ]);

        $data = [
            'jurusan' => Request()->jurusan,
            'tingkat' => Request()->tingkat,
        ];

        $this->JurusanModel->EditData($id,$data);

        alert()->Success('Data berhasil di edit', 'Berhasil!');
        return redirect()->route('jurusan');
    }
}
