@section('title','organisasi')
@extends('layout.v_template')
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Tabel users</h2>
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
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">Logo</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($organisasi as $row)
                        @if ($row->level == 1)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td class="text-center"><img src="{{asset('logoorganisasi/'.$row->logo)}}" width="60px"></td>
                                <td>
                                      <a href="/organisasi/edit/{{$row->id}}" class="btn m-1 btn-warning"><i class="fa fa-edit"></i></a>
                                      <button type="button" class="btn m-1 btn-danger" data-toggle="modal" data-target="#hapus{{$row->id}}">
                                        <i class="fa fa-trash-o"></i>
                                      </button>
                                  </td>
                            </tr>
                        @endif
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

    @foreach ($organisasi as $row)
      <div class="modal fade" id="hapus{{$row->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Perhatian!</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body text-center">
              <p class="lead">Apakah data {{$row->name}} ingin di hapus?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
              <a href="organisasi/hapus/{{$row->id}}" class="btn btn-danger">Hapus</a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
@endsection