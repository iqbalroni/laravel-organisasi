@section('title','DetailOrganisasi')

@extends('layout.v_template')

@section('content')
<div class="x_panel">
    <div class="x_title">
      <h2>Tabel Anggota {{$DetailSiswa->name}}</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <a href="/organisasi/print/{{$DetailSiswa->id}}" class="btn m-1 btn-success"><i class="fa fa-print"></i></a>
        <div class="row">
            <div class="col-sm-12">
              <div class="card-box table-responsive">
      <table id="datatable" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Telp</th>
                <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php $no = 1; @endphp
          @foreach ($ShowSiswa as $row)
              @if ($row->organisasi == $DetailSiswa->name)
              <tr>
                <th scope="row">{{ $no++}}</th>
                <td>{{$row->nama}}</td>
                <td>{{$row->kelas}} {{$row->jurusan}}</td>
                <td>{{$row->jabatan}}</td>
                <td>{{$row->no_telp}}</td>
                <td>
                  <button type="button" class="btn m-1 btn-dark" data-toggle="modal" data-target="#detail{{$row->id}}">
                    <i class="fa fa-search"></i>
                  </button>
                    <a href="/siswa/edit/{{$row->id}}" class="btn m-1 btn-warning"><i class="fa fa-edit"></i></a>
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

  @foreach ($ShowSiswa as $row)
        <!-- detail -->
        <div class="modal fade" id="detail{{$row->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <img src="{{url('fotosiswa/'.$row->foto)}}" width="100px" class="p-2 img-fluid float-right">
                <p class="lead">NISN : {{$row->nisn}}</p>
                <p class="lead">Nama : {{$row->nama}}</p>
                <p class="lead">Kelas : {{$row->kelas}} {{$row->jurusan}}</p>
                <p class="lead">Organisasi : {{$row->organisasi}} - {{$row->jabatan}}</p>
                <p class="lead">Periode : {{$row->periode}}</p>
                <p class="lead">no telp : {{$row->no_telp}}</p>
              </div>
              <div class="modal-footer">
                <a href="https://api.whatsapp.com/send?phone={{$row->no_telp}}" class="btn btn-success">
                  <i class="fa fa-whatsapp"></i>
                </a>
                <button type="button" class="btn btn-dark" data-dismiss="modal">Kembali</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Delete -->
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
                <p class="lead">Apakah data {{$row->nama}} ingin di hapus?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
                <a href="siswa/hapus/{{$row->id}}" class="btn btn-danger">Hapus</a>
              </div>
            </div>
          </div>
        </div>
    @endforeach
@endsection