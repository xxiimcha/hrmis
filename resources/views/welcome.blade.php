@extends('../includes/layout')

@section('extra_css')
<style>
    body {
        background: url('/assets/img/bg1.jpg') no-repeat center center fixed;
        background-size: cover;
    }
</style>
@stop

@section('content')
<div class="container">
    <div class="row d-flex align-items-center justify-content-center vh-100">
        <div class="col-xl-5 text-center">
            <img src="{{ URL::asset('system-images/logo.png') }}" height="100" />
            <p class="h1 fw-bold text-center py-4" style="font-family: 'Lobster', cursive; letter-spacing: 1px; line-height: 10px; color: #81BE83;">HRMIS</p>

            <div class="card shadow rounded-0">
                <div class="card-body text-center p-5">
                    @if($errors->any() || session('message'))
                        @include('../includes/message')
                    @endif

                    <form method="post" onsubmit="showLoaderAnimation()">
                        {{ csrf_field() }}

                        <div class="form-outline mb-2">
                            <input type="email" class="form-control form-control-lg" name="email" required id="email">
                            <label for="email" class="form-label">Email</label>
                        </div>

                        <div class="form-outline mb-2">
                            <input type="password" class="form-control form-control-lg" name="password" required id="password">
                            <label for="password" class="form-label">Password</label>
                            <span toggle="#password" data-mdb-toggle="tooltip" title="Show Password" class="field-icon material-icons-outlined toggle-password" aria-hidden="true">visibility_off</span>
                        </div>

                        <button type="submit" class="btn btn-warning btn-block btn-lg" style="border-radius: 20px">Login</button>

                        <div class="mt-3">
                            <a href="/forgot-password" class="link-dark">
                                Forgot Password?
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="mt-3 small" style="color: white;">
            v {{ app()->version() }} - Copyright {{ date('Y') }}. All rights reserved
            </div>
        </div>
    </div>
</div>
@stop
