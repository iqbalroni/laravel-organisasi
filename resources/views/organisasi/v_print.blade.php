@section('title','DetailOrganisasi')

@extends('layout.v_template')

@section('content')
<div class="x_panel">
    <div class="x_title">
      <h2>Print Anggota {{$DetailSiswa->name}}</h2>
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
      <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">NISN</th>
              <th scope="col">nama</th>
              <th scope="col">periode</th>
              <th scope="col">kelas</th>
              <th scope="col">jurusan</th>
              <th scope="col">jabatan</th>
              <th scope="col">no_telp</th>
              <th scope="col">organisasi</th>
              </tr>
        </thead>
        <tbody>
          @php $no = 1; @endphp
          @foreach ($ShowSiswa as $row)
              @if ($row->organisasi == $DetailSiswa->name)
              <tr>
                <td>{{$no++}}</td>
                    <td>{{ $row->nisn}}</td>
                    <td>{{$row->nama}}</td>
                    <td>{{$row->periode}}</td>
                    <td>{{$row->kelas}}</td>
                    <td>{{$row->jurusan}}</td>
                    <td>{{$row->jabatan}}</td>
                    <td>{{$row->no_telp}}</td>
                    <td>{{$row->organisasi}}</td>
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
@endsection