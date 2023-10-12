<?php

namespace App\Http\Controllers;

use SweetAlert;
use Illuminate\Http\Request;
use App\Models\SiswaModel;
use App\Models\JurusanModel;
use App\Models\UsersModel;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
        $this->SiswaModel = new SiswaModel;
        $this->JurusanModel = new JurusanModel;
        $this->UsersModel = new UsersModel;
    }

    public function index(){

        $data = [
            'siswa' => $this->SiswaModel->ReadData(),
            'no' => 1,
        ];
        return view('siswa.v_siswa',$data);

    }

    public function print(){
        $data = [
            'siswa' => $this->SiswaModel->ReadData(),
            'no' => 1,
        ];
        return view('siswa.v_print',$data);
    }

    public function importsiswa(){
        return view('siswa.v_import');
    }

    public function saveimport(Request $request){
        Request()->validate([
            'name' => 'required',
            'file' => 'required|mimes:xlsx,xls,csv',
        ],[
            'file.required' => 'file wajib diisi',
            'file.mimes' => 'file hanya support xlsx,xls,csv',
        ]);


        $file = $request->file('file');
        
        $nama_file = Request()->name.".".$file->extension();

        $file->move(public_path('DataImport'),$nama_file);

        // dd($nama_file);
        Excel::import(new SiswaImport, public_path('DataImport/').$nama_file);

        alert()->success('Data berhasil diimport', 'Berhasil!');

        return redirect('siswa');
    }

    public function indexadmin(){

        $data = [
            'siswa' => $this->SiswaModel->ReadData(),
            'orgn' => $this->UsersModel->AllData(),
            'no' => 1,
        ];
        return view('siswa.v_siswaadmin',$data);

    }

    public function add(){
        $data = [
            'kelas' => $this->JurusanModel->AllJurusan(),
        ];
        return view('siswa.v_addsiswa',$data);
    }

    public function insert(){
        
        Request()->validate([
            'nisn' => 'required|min:9|max:10',
            'nama' => 'required|max:50',
            'kelas' => 'required',
            'jurusan' => 'required',
            'periode' => 'required',
            'jabatan' => 'required',
            'organisasi' => 'required',
            'telp' => 'required|max:12',
            'foto' => 'required|mimes:jpg,jpeg,png',
        ],[
            'kelas.required' => 'kelas wajib diisi',
            'jurusan.required' => 'jurusan wajib diisi',
            'periode.required' => 'periode wajib diisi',
            'organisasi.required' => 'organisasi wajib diisi',
            'telp.required' => 'no telp wajib diisi',
            'telp.max' => 'no telp maximal 12',
            'nisn.min' => 'Nis minimal 10',
            'nisn.max' => 'Nis maximal 10',
            'nisn.required' => 'Nisn wajib diisi',
            'nisn.unique' => 'Nisn sudah ada',
            'nama.required' => 'Nama wajib diisi',
            'jabatan.required' => 'jabatan wajib diisi',
            'nama.max' => 'Nama maximal 50',
            'foto.required' => 'Foto wajib diisi',
            'foto.mimes' => 'Foto yang di perbolehkan hanya jpg,jpeg,png',
        ]);
    
        //sudah bisa melewati validation simpan ke database
        $file = Request()->foto;
        $nama_file = Request()->nisn.'.'.$file->extension();
        $file->move(public_path('fotosiswa'),$nama_file);

        $data = [
            'nisn' => Request()->nisn,
            'nama' => Request()->nama,
            'periode' => Request()->periode,
            'kelas' => Request()->kelas,
            'jurusan' => Request()->jurusan,
            'organisasi' => Request()->organisasi,
            'jabatan' => Request()->jabatan,
            'no_telp' => Request()->telp,
            'foto' => $nama_file,
        ];

        $this->SiswaModel->addData($data);

        alert()->success('Data berhasil ditambahkan', 'Berhasil!');

        return redirect()->route('siswa');
    }

    public function edit($id){
        $detail = $this->SiswaModel->Detail($id);

        $data = [
            'siswa' => $this->SiswaModel->Detail($id),
            'kelas' => $this->JurusanModel->AllJurusan(),
        ];
        return view('siswa.v_editsiswa',$data);
    }

    public function update($id){
        Request()->validate([
            'nisn' => 'required|min:10|max:11',
            'nama' => 'required|max:50',
            'kelas' => 'required',
            'jurusan' => 'required',
            'periode' => 'required',
            'organisasi' => 'required',
            'jabatan' => 'required',
            'telp' => 'required|max:12',
            'foto' => 'mimes:jpg,jpeg,png',
        ],[
            'kelas.required' => 'kelas wajib diisi',
            'jurusan.required' => 'jurusan wajib diisi',
            'periode.required' => 'periode wajib diisi',
            'organisasi.required' => 'organisasi wajib diisi',
            'jabatan.required' => 'jabatan wajib diisi',
            'telp.required' => 'no telp wajib diisi',
            'telp.max' => 'no telp maximal 12',
            'nisn.min' => 'Nisn minimal 10',
            'nisn.max' => 'Nisn maximal 11',
            'nisn.required' => 'Nisn wajib diisi',
            'nisn.unique' => 'Nisn sudah ada',
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maximal 50',
            'foto.mimes' => 'Foto yang di perbolehkan hanya jpg,jpeg,png',
        ]);
    
        //sudah bisa melewati validation simpan ke database
        if(Request()->foto == ""){

                $data = [
                'nisn' => Request()->nisn,
                'nama' => Request()->nama,
                'periode' => Request()->periode,
                'kelas' => Request()->kelas,
                'jurusan' => Request()->jurusan,
                'organisasi' => Request()->organisasi,
                'jabatan' => Request()->jabatan,
                'no_telp' => Request()->telp,
                ];

                $this->SiswaModel->editData($id,$data);

            }else{
                $file = Request()->foto;
                $nama_file = Request()->nisn.'.'.$file->extension();
                $file->move(public_path('fotosiswa'),$nama_file);

                $data = [
                    'nisn' => Request()->nisn,
                    'nama' => Request()->nama,
                    'periode' => Request()->periode,
                    'kelas' => Request()->kelas,
                    'jurusan' => Request()->jurusan,
                    'organisasi' => Request()->organisasi,
                    'jabatan' => Request()->jabatan,
                    'no_telp' => Request()->telp,
                    'foto' => $nama_file
                ];

                $this->SiswaModel->editData($id,$data);
            }

            alert()->success('Data berhasil di edit', 'Berhasil!');

            return redirect()->route('dashboard');
    }

    public function hapus($id){
        $data = $this->SiswaModel->Detail($id);

        if(!$data->foto == "" && !$data->foto == "default.png"){
            unlink(public_path('fotosiswa/').$data->foto);
        }

        $this->SiswaModel->HapusData($id);

        alert()->success('Data berhasil dihapus', 'Berhasil!');

        return redirect()->route('siswa');
    }

    public function hapusadmin($id){
        $data = $this->SiswaModel->Detail($id);

        if(!$data->foto == ""){
            unlink(public_path('fotosiswa/').$data->foto);
        }

        $this->SiswaModel->HapusData($id);

        alert()->success('Data berhasil dihapus', 'Berhasil!');

        return redirect()->route('admin');
    }
}
