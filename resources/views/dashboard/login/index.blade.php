@extends('layouts.login')

@section('content')
    <section class="flexbox-container">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
                <div class="card border-grey border-lighten-3 m-0">
                    <div class="card-header border-0">
                        <div class="card-title text-center">
                            <div class="p-1">
                                <img src="{{ asset('assets/dashboard/images/logo/logo-dark.png') }}" alt="branding logo">
                            </div>
                        </div>
                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                            <span>@lang('auth.login')</span>
                        </h6>
                        @if (Session::has('error'))
                            @include('includes.alerts.error')
                        @endif

                        @if (Session::has('username'))
                            @include('includes.alerts.success')
                        @endif
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            {{-- <form class="" action="{{ route('login') }}" method="post"> --}}
                            <form class="" action="{{ route('user.login') }}" method="post">
                                @csrf
                                <!-- BEGIN USER NAME INPUT -->
                                {{-- <fieldset class="form-group position-relative has-icon-left mb-0">

                                </fieldset> --}}

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                        </div>
                                        <input type="text" id="name" placeholder="@lang('auth.your_name') | @lang('users.email') | @lang('users.phone')"
                                            name="username" class="form-control @error('username') is-invalid @enderror"
                                            value="{{ old('username') ?? 'super admin' }}" autofocus required>
                                    </div>
                                    @error('username')
                                    <span class="invalid-feedback" role="alert"> <strong> {{ $message }} </strong> </span>
                                    @enderror
                                </div>
                                <!-- END USER NAME INPUT -->

                                <!-- BEGIN USER PASSWORD INPUT -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-eye toggle-password"></i> </span>
                                        </div>
                                        <input type="password" id="password" placeholder="@lang('auth.password')" name="password"
                                            class="form-control form-control-lg input-lg @error('password') is-invalid @enderror"
                                            value="{{ old('password') ?? 123 }}" required>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert"> <strong> {{ $message }} </strong> </span>
                                    @enderror
                                </div>
                                <!-- END USER PASSWORD INPUT -->

                                <!-- BEGIN REMEMBER ME CHECKBOX -->
                                <div class="form-group row">
                                    <div class="col-md-6 col-12 text-center text-md-left">
                                        <fieldset>
                                            <input type="checkbox" id="remember-me" class="chk-remember" name="remember_me">
                                            <label for="remember-me"> @lang('auth.remember_me') </label>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6 col-12 text-center text-md-right">
                                        <a href="recover-password.html" class="card-link"> @lang('auth.forgot_password?')
                                        </a>
                                    </div>
                                </div>
                                <!-- END REMEMBER ME CHECKBOX  -->

                                <button type="submit" class="btn btn-info btn-block">
                                    <i class="fas fa-sign-in-alt"></i> @lang('auth.login')
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
