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
                                <a class="dropdown-item rounded-0 d-flex align-items-center" href="/account-settings">
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
    <a href="/welcome/hr/dashboard">Return to homepage</a>
</div>

<div class="mt-3">
    <div class="container-fluid">
        <section class="px-3">
            <h2 class="h1 fw-bold">Step Increment Notifications</h2>
            <h1 class="h6"></h1>

            @include('includes.message')

            <div class="card mb-3 shadow-none">
                <div class="card-body p-0">
                    <ul style="list-style-type: circle;" class="mt-3">
                        @foreach ($notif as $n)
                            <li>
                                <strong>{{ ucwords($n->employeeTinfo->employeeInfo->firstname . ' ' . $n->employeeTinfo->employeeInfo->middlename . ' ' . $n->employeeTinfo->employeeInfo->lastname) }}</strong>
                                {{ $n->message }}

                                <div class="w-100">
                                    <button data-mdb-toggle="modal" data-mdb-target="#stepUpdate_{{ $n->id }}" class="btn btn-sm btn-warning mt-2">Update now</button>
                                </div>
                                <hr>

                                @include('includes.step-update', ['notification' => $n])
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    </div>
</div>
@stop
