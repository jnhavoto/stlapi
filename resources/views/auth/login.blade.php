@extends('layouts.layout_')

@section('content')

    <div class="login-page" style="margin-top: 6em">

        <div class="login-box">
            <div class="logo">
                <a href="javascript:void(0);">Admin <b>STL</b></a>
                <small>Login to STL Instructor App</small>
            </div>
            <div class="card">
                <div class="body">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">mail</i>
                                </span>
                            <div class="form-line">
                                <input type="text"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="email" placeholder="Email"
                                       required
                                       autofocus>
                            </div>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>


                        <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock</i>
                                </span>
                            <div class="form-line">
                                <input type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" placeholder="Password"
                                       required>
                            </div>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>


                        <div class="row">
                            <div class="col-xs-8 p-t-5">
                                <input type="checkbox" name="remember"
                                       {{ old('remember') ? 'checked' : '' }} id="rememberme"
                                       class="filled-in chk-col-pink">
                                <label for="rememberme">Remember Me</label>
                            </div>
                            <div class="col-xs-4">
                                <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                            </div>
                        </div>


                        <div class="row m-t-15 m-b--20">
                            <div class="col-xs-6 align-right">
                                <a href="{{ route('password.request') }}">Forgot Password?</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
