@section('title','Jurusan')

@extends('layout.v_template')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Tabel Jurusan</h2>
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
              <div class="col-sm-12">
                <div class="card-box table-responsive">
        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Jurusan</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($jurusan as $row)
                            <tr>
                                <td scope="row">{{$loop->iteration}}</td>
                                <td>{{$row->jurusan}} {{$row->tingkat}}</td>
                                <td>
                                    <a href="/jurusan/edit/{{$row->id_jurusan}}" class="btn m-1 btn-warning"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn m-1 btn-danger" data-toggle="modal"
                                    data-target="#hapus{{$row->id_jurusan}}">
                                      <i class="fa fa-trash-o"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
          </tbody>
        </table>
      </div>
      </div>
  </div>
</div>
    </div>
  </div>
</div>

@foreach ($jurusan as $row)
      <!-- Delete -->
      <div class="modal fade" id="hapus{{$row->id_jurusan}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Hapus Jurusan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body text-center">
              <p class="lead">Apakah Jurusan {{$row->jurusan}} {{$row->tingkat}} ingin di hapus?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
              <a href="jurusan/hapus/{{$row->id_jurusan}}" class="btn btn-danger">Hapus</a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
@endsection