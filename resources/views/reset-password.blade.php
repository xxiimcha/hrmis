@extends('includes.layout')
@section('title') Reset Password @stop

@section('extra_css')
    <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}">
@stop

@section('content')
    <div class="container-fluid my-3">
        <div class="row d-flex justify-content-center align-items-center vh-100">
            <div class="col-xl-5 text-center">
                <img src="{{ URL::asset('system-images/logo.png') }}" height="100" />
                <p class="h1 fw-bold text-center py-4" style="font-family: 'Lobster', cursive; letter-spacing: 1px; line-height: 10px;">HRMIS</p>

                <div class="card shadow rounded-0">
                    <div class="card-body p-5">
                        @if($errors->any() || session('message'))
                            @include('includes.message')
                        @endif

                        <form onsubmit="showLoaderAnimation()" method="POST" action="/reset-password">
                            {{ csrf_field() }}

                            <input type="hidden" value="{{ $token }}" name="token">

                            <div class="form-outline mb-2">
                                <input type="email" class="form-control form-control-lg" readonly value="{{ request()->email }}" id="email" name="email" required/>
                                <label class="form-label" for="email">Email</label>
                            </div>

                            <div class="form-outline mb-2">
                                <input type="password" id="password-input" min-length="8" class="form-control form-control-lg" name="password" required/>
                                <label class="form-label" data-mdb-error="wrong" data-mdb-success="right" for="password-input">Password</label>
                                <span toggle="#password-input" class="field-icon material-icons-outlined toggle-password" aria-hidden="true">visibility</span>
                            </div>

                            <div class="border rounded mb-2 text-left" role="alert" data-mdb-color="warning" id="password-alert">
                                <div class="px-3 pt-2 small fw-bold text-left">Password must have at least:</div>

                                <ul class="list-unstyled mt-2 px-3">
                                    <li class="requirements leng d-flex align-items-center">
                                        <span class="text-success pe-2 material-icons-outlined fa-check">check</span>
                                        <span class="text-danger pe-2 material-icons-outlined fa-times">highlight_off</span>
                                        8 characters
                                    </li>

                                    <li class="requirements big-letter d-flex align-items-center">
                                        <span class="text-success pe-2 material-icons-outlined fa-check">check</span>
                                        <span class="text-danger pe-2 material-icons-outlined fa-times">highlight_off</span>
                                        1 big letter
                                    </li>

                                    <li class="requirements num d-flex align-items-center">
                                        <span class="text-success pe-2 material-icons-outlined fa-check">check</span>
                                        <span class="text-danger pe-2 material-icons-outlined fa-times">highlight_off</span>
                                        1 number
                                    </li>

                                    <li class="requirements special-char d-flex align-items-center">
                                        <span class="text-success pe-2 material-icons-outlined fa-check">check</span>
                                        <span class="text-danger pe-2 material-icons-outlined fa-times">highlight_off</span>
                                        1 special character
                                    </li>
                                </ul>
                            </div>

                            <div class="form-outline mb-2">
                                <input type="text" style="-webkit-text-security: disc;" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation" required/>
                                <label class="form-label" for="password_confirmation">Confirm Password</label>
                            </div>

                            <button class="btn btn-warning mt-3 btn-lg btn-block" style="border-radius: 20px" type="submit">reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('extra_js')
    <script src="{{ URL::asset('js/password.js') }}"></script>
@stop
