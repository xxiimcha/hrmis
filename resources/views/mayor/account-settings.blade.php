@extends('includes.layout')

@section('content')
<header>
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light fixed-top bg-white border-bottom shadow-none">
        <div class="container-fluid">
            <div class="navbar-brand p-0" style="font-family: 'Lobster', cursive; font-size: 30px">
                <img src="{{ URL::asset('system-images/logo.png') }}" alt="logo" class="me-3 ms-2" height="40">
                HRMIS
            </div>

            <ul class="navbar-nav ms-auto d-flex flex-row">
                <li class="nav-item dropdown">
                    <div class="d-flex align-items-center">
                        <a class="nav-link dropdown-toggle text-dark d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <div class="small text-truncate forName">{{ ucwords(auth()->user()->headInfo->firstname . ' ' . auth()->user()->headInfo->middlename . ' ' . auth()->user()->headInfo->lastname) }}</div>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end rounded-0 border" aria-labelledby="navbarDropdownMenuLink">
                            <li class="text-center my-2">
                                <img src="{{ URL::asset('user-images/' . auth()->user()->headInfo->avatar) }}" height="100" style="border-radius: 100%" alt="" />
                            </li>

                            <li>
                                <a class="dropdown-item rounded-0 d-flex align-items-center" href="account-settings">
                                    <span class="material-icons-outlined pe-2">manage_accounts</span>
                                    <font class="pt-1">Account Settings</font>
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item rounded-0 d-flex align-items-center" href="/logout">
                                    <span class="material-icons-outlined pe-2">logout</span>
                                    <font class="pt-1">Logout</font>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="material-icons-outlined text-dark">menu</span>
            </button>
        </div>
    </nav>
</header>

<div class="w-100 border-bottom py-2 ps-3" style="margin-top: 65px">
    <a href="/welcome/mayor/dashboard">Return to homepage</a>
</div>

<div class="mt-3">
    <div class="container-fluid">
        <section class="px-3">
            <h2 class="h1 fw-bold">Account Settings</h2>
            <h1 class="h6">
                Customize Your Experience, Tailored to You.
            </h1>

            @include('includes.message')

            <div class="card mb-3 shadow-none">
                <div class="card-body p-0">
                    <ul class="nav nav-tabs mb-3" id="ex-with-icons" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active d-flex align-items-center justify-content-center fw-bold" id="personal-info0" data-mdb-toggle="tab" href="#personal-info" role="tab" aria-controls="personal-info" aria-selected="true">
                                <span class="material-icons-outlined me-2">info</span> Details
                            </a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link d-flex align-items-center justify-content-center fw-bold" id="leave-card0" data-mdb-toggle="tab" href="#leave-card" role="tab" aria-controls="leave-card" aria-selected="false">
                                <span class="material-icons-outlined me-2">password</span> Change Password
                            </a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link d-flex align-items-center justify-content-center fw-bold" id="profile-picture0" data-mdb-toggle="tab" href="#profile-picture" role="tab" aria-controls="profile-picture" aria-selected="false">
                                <span class="material-icons-outlined me-2">photo_camera</span> Change Profile Picture
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content" id="info-content">
                        <div class="tab-pane fade show active py-2" id="personal-info" role="tabpanel" aria-labelledby="personal-info">
                            <div class="row">
                                <div class="col-xl-5">
                                    <form method="POST">
                                        {{ csrf_field() }}

                                        <div class="form-outline mb-3">
                                            <input type="email" value="{{ auth()->user()->email }}" class="form-control form-control-lg" name="email" required id="email">
                                            <label for="email" class="form-label">Email</label>
                                        </div>

                                        <div class="form-outline mb-3">
                                            <input type="text" value="{{ auth()->user()->headInfo->firstname }}" class="form-control form-control-lg" name="firstname" required id="firstname">
                                            <label for="firstname" class="form-label">First name</label>
                                        </div>

                                        <div class="form-outline mb-3">
                                            <input type="text" value="{{ auth()->user()->headInfo->middlename }}" class="form-control form-control-lg" name="middlename" required id="middlename">
                                            <label for="middlename" class="form-label">Middle name</label>
                                        </div>

                                        <div class="form-outline mb-3">
                                            <input type="text" value="{{ auth()->user()->headInfo->lastname }}" class="form-control form-control-lg" name="lastname" required id="lastname">
                                            <label for="lastname" class="form-label">Last name</label>
                                        </div>

                                        <button type="submit" name="basic" class="btn btn-warning" value="save changes">save changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade py-2" id="leave-card" role="tabpanel" aria-labelledby="leave-card">
                            <form method="POST">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-xl-5">
                                        <div class="form-outline mb-3">
                                            <input type="password" class="form-control form-control-lg" name="currentPassword" required id="cpassword">
                                            <label for="cpassword" class="form-label">Current Password</label>
                                        </div>

                                        <div class="form-outline mb-3">
                                            <input type="password" class="form-control form-control-lg" name="newPassword" required id="npassword">
                                            <label for="npassword" class="form-label">New Password</label>
                                        </div>

                                        <div class="form-outline mb-3">
                                            <input type="password" class="form-control form-control-lg" name="confirmPassword" required id="confirmpassword">
                                            <label for="confirmpassword" class="form-label">Confirm Password</label>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" name="forpass" class="btn btn-warning" value="save changes">save changes</button>
                            </form>
                        </div>

                        <div class="tab-pane fade py-2" id="profile-picture" role="tabpanel" aria-labelledby="profile-picture">
                            <div class="note note-info small mb-3">
                                <strong>Note:</strong> After you choose & adjust the image, click "Done Adjusting Image" first before submitting.
                            </div>

                            <form method="POST">
                                {{ csrf_field() }}

                                <div class="form-outline">
                                    <input type="file" accept=".jpg, .jpeg" id="file-input" class="form-control form-control-lg" required/>
                                </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="result mt-2 border" style="height: 500px; width: 500px;"></div>
                                    </div>

                                    <div class="col-xl-6 text-left">
                                        <button type="button" id="done_adjust" disabled="false" class="btn bluish_button fw-bold btn-sm mt-2">done adjusting image</button>
                                        <input type="hidden" name="image_data" id="image_data"/>
                                    </div>
                                </div>

                                <button type="submit" name="forimage" class="btn btn-warning mt-4" value="save changes">save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@stop

@section('extra_js')
    <script src='{{ URL::asset("js/new-resident.js") }}'></script>
@stop
