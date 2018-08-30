@extends('layouts.layout_')

@section('content')
    <section id="wrapper">
        <div class="login-register"
             {{--style="background-image:url({{ asset('theme/images/background/login-register.jpg') }});"--}}
        >
            <div class="login-box card">

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <h3 class="box-title m-b-20">Sign In</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">

                                <input id="email" type="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox checkbox-primary pull-left p-t-0">
                                    <input id="checkbox-signup" type="checkbox"
                                           name="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label for="checkbox-signup"> Remember me </label>
                                </div>
                                <a href="{{ route('password.request') }}" id="to-recover" class="text-dark pull-right"><i
                                            class="fa fa-lock m-r-5"></i> Forgot password?</a>
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                        type="submit">Log In
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        {{--</div>--}}
        {{--</div>--}}
    </section>
@endsection
