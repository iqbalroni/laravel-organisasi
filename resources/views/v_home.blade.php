@section('title','Dashboard')

@extends('layout.v_template')

@section('content')
    <div class="container">
        <h3>{{ Auth::user()->name }}</h3>
        
    <div class="row">
        @if (auth()->user()->level == 2)
            <?php $tot = 0; ?>
            @foreach ($siswa as $row)
                @if ($row->organisasi == Auth::user()->name )
                    <?php $tot++ ?>
                @endif
            @endforeach
            <div class="col-xl-6 mb-2">
                <div class="x_panel">
                    <div class="x_title">
                      <h2>Anggota {{ Auth::user()->name }}</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="tile_count">
                            <div class="tile_stats_count">
                              <span class="count_top"><i class="fa fa-user"></i> Total Siswa</span>
                              <div class="count">{{$tot}}</div>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        @endif

        @if (auth()->user()->level == 1)
            <?php $adm = 0; ?>
            @foreach ($siswa as $row)
                    <?php $adm++ ?>
            @endforeach
            <div class="col-xl-6 mb-2">
                <div class="x_panel">
                    <div class="x_title">
                      <h2>Total Siswa</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="tile_count">
                            <div class="tile_stats_count">
                              <span class="count_top"><i class="fa fa-user"></i> Total Siswa</span>
                              <div class="count">
                                {{$adm}}
                              </div>
                            </div>
                        </div>
                    </div>
                  </div>
            <?php $org = 0; ?>
            @foreach ($organisasi as $row)
                @if ($row->level == 2)
                    <?php $org++ ?>
                @endif
            @endforeach
                
            <div class="x_panel">
                <div class="x_title">
                  <h2>Total Organisasi</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="tile_count">
                        <div class="tile_stats_count">
                          <span class="count_top"><i class="fa fa-leaf"></i> Total Organisasi</span>
                          <div class="count">
                            {{$org}}
                          </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        @endif
        
        <div class="col-xl-6 mb-2">
            <div class="x_panel">
                <div class="x_title">
                  <h2>Logo</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content text-center">
                    <img src="{{asset('logoorganisasi')}}/{{ Auth::user()->logo}}" class="rounded-circle" height="100px" width="100px" alt="..."><br><br>
                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#staticBackdrop">
                        <i class="fa fa-edit"></i>
                      Ganti Logo
                    </button>
                </div>
              </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Ganti Logo</h5>
        </div>
        <form action="/logo/{{Auth::user()->id}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                    <input type="hidden" name="name" class="form-control" value="{{ Auth::user()->name}}" readonly>
                <div class="form-group">
                    <label>Logo</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="logo">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        <div class="text-danger">
                            @error('logo')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-dark">Ganti</button>
            </div>
        </form>
      </div>
    </div>
  </div>
    </div>
@endsection