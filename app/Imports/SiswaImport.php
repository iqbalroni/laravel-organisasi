<?php

namespace App\Imports;

use App\Models\SiswaModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SiswaModel([
            'nisn' => $row['nisn'],
            'nama' => $row['nama'],
            'periode' => $row['periode'],
            'kelas' => $row['kelas'],
            'jurusan' => $row['jurusan'],
            'organisasi' => Request()->name,
            'jabatan' => $row['jabatan'],
            'no_telp' => $row['no_telp'],
            'foto' => 'default.png',
        ]);
    }
}
