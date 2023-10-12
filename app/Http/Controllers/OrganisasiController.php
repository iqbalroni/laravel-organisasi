<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersModel;
use SweetAlert;
use Illuminate\Support\Facades\Hash;


class OrganisasiController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->UsersModel = new UsersModel;
    }

    public function index(){
        $data =[
            'organisasi' => $this->UsersModel->AllData(),
            'no' => 1,
        ];
        return view('organisasi.v_organisasi',$data);
    }

    public function tabeladmin(){
        $data =[
            'organisasi' => $this->UsersModel->AllData(),
            'no' => 1,
        ];
        return view('organisasi.v_organisasi-admin',$data);
    }

    public function insert(){
        return view('organisasi.v_addorganisasi');
    }

    public function save(){
        request()->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|unique:users,email',
            'level' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ],[
            'name.required' => 'Nama organisasi wajib diisi',
            'name.unique' => 'Nama sudah dipakai',
            'email.required' => 'email wajib diisi',
            'level.required' => 'level wajib diisi',
            'email.unique' => 'email sudah dipakai',
            'password.required' => 'password wajib diisi',
            'password.min' => 'password minimal 8',
            'password_confirmation.required' => 'konfirmasi password wajib diisi',
            'password_confirmation.same' => 'konfirmasi password salah',
            'password_confirmation.min' => 'password minimal 6',
        ]);

        // password hash
        $savepassword = Hash::make(Request()->password);

        $data = [
            'name' => Request()->name,
            'email' => Request()->email,
            'password' => $savepassword,
            'level' => Request()->level
        ];

        $this->UsersModel->AddData($data);

        alert()->success('Data berhasil di tambah', 'Berhasil!');
        
        return redirect()->route('organisasi');
    }

    public function hapus($id){
        $data = $this->UsersModel->Detail($id);
        $name_organisasi = $data->name;

        if(!$data->logo == "" && !$data->logo == "default.svg"){
            unlink(public_path('logoorganisasi/').$data->logo);
        }

        $this->UsersModel->HapusSiswa($name_organisasi);
        $this->UsersModel->HapusData($id);

        alert()->success('Data berhasil dihapus', 'Berhasil!');

        return redirect()->route('organisasi');
    }

    public function edit($id){
        $data =[
            'organisasi' => $this->UsersModel->Detail($id),
        ];
        return view('organisasi.v_editorganisasi',$data);
    }

    public function saveedit($id){
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'logo' => 'mimes:jpg,png,jpeg',
            'level' => 'required',
            'password' => 'min:8',
            'password_confirmation' => 'min:8|same:password',
        ],[
            'name.required' => 'Nama organisasi wajib diisi',
            'email.required' => 'Email wajib diisi',
            'level.required' => 'level wajib diisi',
            'logo.mimes' => 'Logo yang di perbolehkan hanya jpg,jpeg,png',
            'password.min' => 'password minimal 8',
            'password_confirmation.required' => 'konfirmasi password wajib diisi',
            'password_confirmation.same' => 'konfirmasi password salah',
        ]);

        if(Request()->logo == ""){

            if(Request()->password == ""){
                $data =[
                    'name' => Request()->name,
                    'email' => Request()->email,
                    'level' => Request()->level
                ];
            }else{
                $savepassword = Hash::make(Request()->password);

                $data = [
                    'name' => Request()->name,
                    'email' => Request()->email,
                    'password' => $savepassword,
                    'level' => Request()->level
                ];
            }

            $this->UsersModel->EditData($id,$data);
        }else{
            $file = Request()->logo;
            $name_file = Request()->name.'.'.$file->extension();
            $file->move(public_path('logoorganisasi/'),$name_file);

            if(Request()->password == ""){
                $data =[
                    'name' => Request()->name,
                    'email' => Request()->email,
                    'level' => Request()->level,
                    'logo' => $name_file,
                ];
            }else{
                $savepassword = Hash::make(Request()->password);

                $data = [
                    'name' => Request()->name,
                    'email' => Request()->email,
                    'password' => $savepassword,
                    'level' => Request()->level,
                    'logo' => $name_file,
                ];
            }

            $this->UsersModel->EditData($id,$data);
        }

        alert()->success('Data berhasil di edit', 'Berhasil!');

        return redirect()->route('organisasi');
    }

    public function detail($id){
        $data = [
            'ShowSiswa' => $this->UsersModel->AllSiswa(),
            'DetailSiswa'=> $this->UsersModel->Detail($id),
        ];
        return view('organisasi.v_detail',$data);
    }

    public function print($id){
        $data = [
            'ShowSiswa' => $this->UsersModel->AllSiswa(),
            'DetailSiswa'=> $this->UsersModel->Detail($id),
        ];
        return view('organisasi.v_print',$data);
    }
}
