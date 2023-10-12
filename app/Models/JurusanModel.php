<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JurusanModel extends Model
{
    public function AllJurusan(){
        return  DB::table('tbl_jurusan')->get();
    }

    public function TambahData($data){
        DB::table('tbl_jurusan')->insert($data);
    }

    public function HapusData($id){
        DB::table('tbl_jurusan')->where('id_jurusan', '=', $id)->delete();
    }

    public function HapusSiswa($kelas){
        DB::table('tbl_siswa')
            ->where('id_jurusan','=' ,$kelas)
            ->delete();
    }

    public function DetailData($id){
        return DB::table('tbl_jurusan')
        ->where('id_jurusan', $id)
        ->first();
    }

    public function EditData($id,$data){
        DB::table('tbl_jurusan')
            ->where('id_jurusan', $id)
            ->update($data);
    }
}
