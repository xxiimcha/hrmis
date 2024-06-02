@extends('../includes/layout')

@section('extra_css')
<style>
    body {
        background: url('/img/bg1.jpg') no-repeat center center fixed;
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

                            <div class="form-outline">
                                <input type="password" class="form-control form-control-lg" name="password" required id="password">
                                <label for="password" class="form-label">Password</label>

                                <a href="/forgot-password" class="link-dark">
                                    <span class="field-icon material-icons-outlined" data-mdb-toggle="tooltip" title="Forgot Password" style="margin-right: 40px">lock_open</span>
                                </a>

                                <span toggle="#password" data-mdb-toggle="tooltip" title="Show Password" class="field-icon material-icons-outlined toggle-password" aria-hidden="true">visibility_off</span>
                            </div>

                            <button type="submit" class="btn btn-warning btn-block btn-lg mt-3" style="border-radius: 20px">login</button>
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
