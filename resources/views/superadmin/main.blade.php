@extends('includes.layout')

@section('content')
    <div class="container my-4">
        <h4 class="fw-bold">Create Accounts</h3>
        @include('includes.message')

        <div class="row">
            <div class="col-xl-5">
                <p>Heads</p>

                <form method="POST">
                    {{ csrf_field() }}

                    <select name="role" class="select form-control">
                        <option disabled selected>Choose role</option>
                        <option value="1">1 = HR</option>
                        <option value="2">2 = Data Encoder</option>
                        <option value="3">3 = Mayor</option>
                        <option value="4">4 = Department Head</option>
                    </select>

                    <div class="my-2"></div>

                    <select name="department" class="select form-control">
                        <option disabled selected>Choose Department</option>
                        <option value="0">All</option>

                        @foreach ($departments as $dept)
                            <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                        @endforeach
                    </select>

                    <div class="form-outline my-2">
                        <input type="email" class="form-control form-control-lg" name="email" required id="email">
                        <label for="email" class="form-label">Email</label>
                    </div>

                    <div class="form-outline mb-2">
                        <input type="text" class="form-control form-control-lg" name="password" required id="password">
                        <label for="password" class="form-label">Password</label>
                    </div>

                    <div class="form-outline mb-2">
                        <input type="text" class="form-control form-control-lg" name="firstname" required id="firstname">
                        <label for="firstname" class="form-label">First name</label>
                    </div>

                    <div class="form-outline mb-2">
                        <input type="text" class="form-control form-control-lg" name="middlename" required id="middlename">
                        <label for="middlename" class="form-label">Middle name</label>
                    </div>

                    <div class="form-outline mb-2">
                        <input type="text" class="form-control form-control-lg" name="lastname" required id="lastname">
                        <label for="lastname" class="form-label">Last name</label>
                    </div>

                    <button type="submit" class="btn btn-sm btn-warning">submit</button>
                </form>
            </div>
        </div>
    </div>
@stop
