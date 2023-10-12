@section('title','AddOrganisasi')

@extends('layout.v_template')

@section('content')
<div class="x_panel">
    <div class="x_title">
      <h2>Tambah Organisasi</h2>
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
                <form action="/organisasi/simpan" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-9">
                                <label>Nama Organisasi</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        <div class="text-danger">
                            @error('name')
                            {{$message}}
                            @enderror
                        </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Level</label>
                                    <select class="custom-select" id="inputGroupSelect01" name="level">
                                        <option value="2">User</option>
                                        <option value="1">Admin</option>
                                      </select>
                                    <div class="text-danger">
                                        @error('kelas')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{old('email')}}">
                        <div class="text-danger">
                            @error('email')
                            {{$message}}
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" value="{{old('password')}}">
                                <div class="text-danger">
                                    @error('password')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" value="{{old('password_confirmation')}}">
                        <div class="text-danger">
                            @error('password_confirmation')
                            {{$message}}
                            @enderror
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