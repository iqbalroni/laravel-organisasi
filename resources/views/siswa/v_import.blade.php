@section('title','Siswa')

@extends('layout.v_template')

@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="alert alert-warning" role="alert">
      <div class="row d-flex align-items-center">
        <div class="col-sm-11">
          <h5><i class="fa fa-warning"></i> Warning!</h5>
          Download contoh <b>template excel</b> di samping untuk mengimport!
        </div>
        <div class="col-sm-1">
            <a href="{{asset('TemplateExcel.xlsx')}}" class="btn btn-success" download="Template.xlsx">
              <i class="fa fa-download"></i>
            </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Import Anggota</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <form action="/siswa/saveimport" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" readonly hidden>
                <div class="text-danger">
                    @error('name')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label>Import Excel</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="file">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    <div class="text-danger">
                        @error('file')
                        {{$message}}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit">Import</button>
            </div>
        </form>
      </div>
  </div>
</div>
    </div>
  </div>
</div>
</div>
@endsection