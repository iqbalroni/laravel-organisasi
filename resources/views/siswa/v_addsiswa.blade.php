@section('title','AddSiswa')

@extends('layout.v_template')

@section('content')
<div class="x_panel">
    <div class="x_title">
      <h2>Tambah Data</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <form action="/siswa/insert" method="post" enctype="multipart/form-data">
            @csrf
                    <div class="form-group">
                        <label>NISN</label>
                        <input type="text" name="nisn" class="form-control" value="{{old('nisn')}}">
                        <div class="text-danger">
                            @error('nisn')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{old('nama')}}">
                        <div class="text-danger">
                            @error('nama')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <div class="input-group">
                                            <select class="custom-select" id="inputGroupSelect01" name="kelas">
                                              <option value="">Pilih...</option>
                                              <option value="X">X</option>
                                              <option value="XI">XI</option>
                                              <option value="XII">XII</option>
                                            </select>
                                        </div>
                                            <div class="text-danger">
                                                @error('kelas')
                                                {{$message}}
                                                @enderror
                                            </div>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label>Jurusan</label>
                                        <div class="input-group">
                                            <select class="custom-select" id="inputGroupSelect01" name="jurusan">
                                              <option value="">Pilih...</option>
                                              @foreach ($kelas as $row)
                                                <option value="{{$row->jurusan}} {{$row->tingkat}}">
                                                    {{$row->jurusan}} {{$row->tingkat}}
                                                </option>
                                              @endforeach
                                            </select>
                                        </div>
                                            <div class="text-danger">
                                                @error('kelas')
                                                {{$message}}
                                                @enderror
                                            </div>
                                    </div>
                                </div>
                            </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Periode</label>
                                <input type="text" name="periode" class="form-control" value="{{old('periode')}}">
                                <div class="text-danger">
                                    @error('periode')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Organisasi</label>
                                <input type="text" name="organisasi" class="form-control" value="{{ Auth::user()->name }}" readonly>
                                <div class="text-danger">
                                    @error('organisasi')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Jabatan-organisasi</label>
                        <select class="custom-select" id="inputGroupSelect01" name="jabatan">
                            <option value="anggota">Anggota</option>
                            <option value="ketua">Ketua</option>
                            <option value="seketaris">Seketaris</option>
                            <option value="bendahara">Bendahara</option>
                          </select>
                        <div class="text-danger">
                            @error('jabatan')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    
    
                    <div class="form-group">
                        <label>foto</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                              <input type="file" name="foto" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                              <label class="custom-file-label" for="inputGroupFile01">Pilih gambar</label>
                            </div>
                          </div>
                        <div class="text-danger">
                            @error('foto')
                            {{$message}}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>No Telp</label>
                        <input type="tel" name="telp" class="form-control" value="{{old('telp')}}">
                        <div class="text-danger">
                            @error('telp')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Simpan</button>
                    </div>
                </div>
            </div>

    
        </form>
    </div>
  </div>
@endsection