<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SiswaModel extends Model
{
    protected $table = "tbl_siswa";

    protected $fillable = [
        'nisn','nama','periode','kelas','jurusan','organisasi','jabatan','no_telp','foto',
    ];
    
    public function ReadData(){
        return DB::table('tbl_siswa')->get();
    }

    public function Detail($id){
        return DB::table('tbl_siswa')
        ->where('id', $id)
        ->first();
    }

    public function addData($data){
        DB::table('tbl_siswa')->insert($data);
    }

    public function editData($id,$data){
        DB::table('tbl_siswa')->where('id', $id)->update($data);
    }

    public function HapusData($id){
        DB::table('tbl_siswa')->where('id', '=', $id)->delete();
    }
}
