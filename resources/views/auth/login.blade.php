@section('title','Login')
@include('layout.head')

<body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form class="user" method="POST" action="{{ route('login') }}">
                @csrf
              <h1>Login</h1>
              <div>
                <input type="email" name="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-round btn-secondary">Login!</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <br>
                <div>
                  <h1><i class="fa fa-leaf"></i> Organisasi!</h1>
                  <p>©2021 All Rights Reserved. Smkn1Bondowoso - Organisasi. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>

@include('layout.script');