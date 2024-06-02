@extends('includes.layout')
@section('title') Forgot Password @stop

@section('extra_css')
    <style>
        body { background-color: rgba(0, 0, 0, 0.04) }
    </style>
@stop

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center vh-100">
            <div class="col-xl-5 text-center">
                <img src="{{ URL::asset('system-images/logo.png') }}" height="100" />
                <p class="h1 fw-bold text-center py-4" style="font-family: 'Lobster', cursive; letter-spacing: 1px; line-height: 10px;">HRMIS</p>

                <div class="card shadow rounded-0">
                    <div class="card-body text-center p-5">
                        @if($errors->any() || session('message'))
                            @include('includes.message')
                        @endif

                        <form consubmit="showLoaderAnimation()" method="POST" action="/forgot-password-func">
                            {{ csrf_field() }}

                            <div class="form-outline">
                                <input type="email" class="form-control form-control-lg" id="email" name="email" required/>
                                <label class="form-label" for="email">Email</label>
                            </div>

                            <button class="btn btn-warning btn-lg btn-block mt-3" style="border-radius: 20px" type="submit">send reset link</button>
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
