@extends('layouts.system.app')
@push('Css')

@endpush
@section('content')


    <!-- End Navbar -->
    <div class="wrapper wrapper-full-page">
        <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('{{asset('system/assets/img/login.jpg')}}'); background-size: cover; background-position: top center;">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">

                            <form method="POST" class="form" action="{{ route('login') }}">
                                @csrf
                            <div class="card card-login card-hidden">
                                <div class="card-header card-header-rose text-center">
                                    <h4 class="card-title"><img src="{{asset('site/img/prologow.svg')}}" width="200px;" alt=""></h4>

                                </div>
                                <div class="card-body ">

                    <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">email</i>
                        </span>
                      </div>
                      <input type="email" class="form-control" id="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email...">
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                    </div>
                  </span>
                                    <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">lock_outline</i>
                        </span>
                      </div>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password...">
                        @error('password')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </span>
                                </div>
                                <div class="card-footer justify-content-center">
                                    <button type="submit"class="btn btn-rose btn-link btn-lg">
                                       BAŞLA
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @include('system.components.footer')
        </div>
    </div>

@endsection
@push('Js')
    <script>
        $(document).ready(function() {
            md.checkFullPageBackgroundImage();
            setTimeout(function() {
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700);
        });
    </script>
@endpush
