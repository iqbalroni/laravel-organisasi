@section('title','Jurusan')

@extends('layout.v_template')

@section('content')
<div class="x_panel">
      <div class="x_title">
        <h2>Tambah jurusan</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
            <div class="col-md-6">
                <form action="/jurusan/simpan" method="post">
                    @csrf
                    <div class="row">
                      <div class="col-sm-10">
                        <div class="form-group">
                          <label>Jurusan</label>
                          <select class="custom-select" id="inputGroupSelect01" name="jurusan">
                              <option value="">Pilih</option>
                              <option value="Administrasi Perkantoran">Administrasi Perkantoran</option>
                              <option value="Akuntansi">Akuntansi</option>
                              <option value="Bisnis daring pemasaran">Bisnis daring pemasaran</option>
                              <option value="Multimedia">Multimedia</option>
                              <option value="Perbankan">Perbankan</option>
                              <option value="Perfilman">Perfilman</option>
                              <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                              <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
                              <option value="Teknik Pertelevisian">Teknik Pertelevisian</option>
                            </select>
                          <div class="text-danger">
                              @error('jurusan')
                              {{$message}}
                              @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <label>-</label>
                          <select class="custom-select" id="inputGroupSelect01" name="tingkat">
                              <option value="">Pilih</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                            </select>
                          <div class="text-danger">
                              @error('jurusan')
                              {{$message}}
                              @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                      </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
      </div>
    </div>
@endsection