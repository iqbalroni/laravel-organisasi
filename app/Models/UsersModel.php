<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsersModel extends Model
{
    public function EditData($id,$data){
        DB::table('users')
            ->where('id', $id)
            ->update($data);
    }

    public function AllData(){
        return DB::table('users')->get();
    }

    public function AddData($data){
        DB::table('users')
                ->insert($data);
    }

    public function HapusData($id){
        DB::table('users')
            ->where('id', '=', $id)
            ->delete();
    }

    public function HapusSiswa($name_organisasi){
        DB::table('tbl_siswa')
            ->where('organisasi','=' ,$name_organisasi)
            ->delete();
    }

    public function Detail($id){
        return DB::table('users')
        ->where('id', $id)
        ->first();
    }

    public function AllSiswa(){
        return DB::table('tbl_siswa')->get();
    }
}
