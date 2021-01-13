@extends('multiauth::layouts.app')
@section('content')
<div class="page">
    <div class="page-header page-header-bordered" style="background:#0b5345;">

        <h1 class="page-title" style="color:white;">Change Password - Admin</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" style="color:white;">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('admin.password.change') }}" style="color:white;">Change
                    Password</a>
            </li>

        </ol>
    </div>

    <div class="page-content">
        <div class="panel">

            <div class="panel-body container-fluid" style="background: #d5d8dc;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12" style="font-weight: bold; color: black;">
                            <div>

                                <div>
                                    <form method="POST" action="{{ route('admin.password.change') }}"
                                        aria-label="{{ __('Admin Change Password') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="oldPassword"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="oldPassword" type="password"
                                                    class="form-control{{ $errors->has('oldPassword') ? ' is-invalid' : '' }}"
                                                    name="oldPassword" value="{{ $oldPassword ?? old('oldPassword') }}"
                                                    required autofocus> @if ($errors->has('oldPassword'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('oldPassword') }}</strong>
                                                </span> @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password"
                                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                    name="password" required> @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span> @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password-confirm"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" required>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Change Password') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection