<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiswaModel;
use App\Models\UsersModel;
use SweetAlert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->SiswaModel = new SiswaModel;
        $this->UsersModel = new UsersModel;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){

        $data = [
            'siswa' => $this->SiswaModel->ReadData(),
            'organisasi' => $this->UsersModel->AllData(),
        ];
        return view('v_home',$data);

    }

    public function editlogo($id){
        Request()->validate([
            'logo' => 'required|mimes:jpg,jpeg,png',
        ],[
            'logo.required' => 'logo harus di isi',
            'logo.mimes' => 'logo hanya support jpg dan jpeg',
        ]);

        $file = Request()->logo;
        $nama_file = Request()->name.'.'.$file->extension();
        $file->move(public_path('logoorganisasi'),$nama_file);

        $data = [
            'logo' => $nama_file
        ];

        $this->UsersModel->EditData($id,$data);

        alert()->success('Data berhasil di edit', 'Berhasil!');

        return redirect()->route('dashboard');
    }
}
