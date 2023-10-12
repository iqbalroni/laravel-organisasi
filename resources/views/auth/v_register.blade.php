
@section('title','Register')
@include('layout.head')

<body class="bg-gradient-success">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="{{asset('template/img/register.png')}}" class="img-fluid">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Registrasi</h1>
                                    </div>
                                    <form method="POST" action="{{ route('register') }}" class="user">
                                        @csrf

                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control form-control-user"
                                                id="name" required autocomplete="name" autofocus
                                                placeholder="Nama" value="{{ old('name') }}">
                                        </div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror


                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="email" placeholder="email" value="{{ old('email') }}"
                                                required autocomplete="email">
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control form-control-user"
                                                        id="password" placeholder="Password" value="{{ old('password') }}" required autocomplete="password">
                                                </div>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="password" name="password_confirmation" class="form-control form-control-user"
                                                        id="password-confirm" placeholder="Konfirmasi password" required autocomplete="new-password">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-success btn-user btn-block">
                                            Register
                                        </button>


                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small text-success" href="{{ route('login') }}">login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

@include('layout.script');