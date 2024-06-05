@php
    $user_role = ['HR Manager', 'Data Encoder', 'Mayor', 'Department Head'];
@endphp

<header>
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white border-end" data-mdb-perfect-scrollbar='true'>
		<div class="mx-3 mt-4 mb-3 text-center px-3 py-2 border rounded fw-bold">
            {{ ucwords($user_role[auth()->user()->role - 1]) }}
        </div>

		<div class="position-sticky">
        	<div class="list-group list-group-flush">
                <a href="/welcome/hr/dashboard" class="list-group-item list-group-item-action py-2 ripple d-flex align-items-center {{ Request::is('welcome/hr/dashboard') ? 'bg-warning text-white' : '' }}">
                    <span class="material-icons-outlined pe-2">dashboard</span>
                    <font class="pt-1">Dashboard</font>
                </a>

                <a aria-current="true"  href="#hr" aria-controls="hr" aria-expanded="true" class="list-group-item list-group-item-action py-2 ripple d-flex align-items-center justify-content-between {{ strpos(url()->current(), 'welcome/hr/employee') !== false ? 'bg-warning text-white' : '' }}">
                    <div class="d-flex align-items-center">
                        <span class="material-icons-outlined pe-2">group</span>
                        <font class="pt-1">Employee</font>
                    </div>

                    <div>
                        <span class="material-icons-outlined pt-2">keyboard_arrow_down</span>
                    </div>
                </a>

                <ul id="hr" class=" {{ strpos(url()->current(), 'welcome/hr/employee') !== false ? 'show' : '' }} list-group list-group-flush">
                    <a href="/welcome/hr/employee/all" class="list-group-item list-group-item-action py-2 ripple d-flex align-items-center justify-content-between {{ strpos(url()->current(), '/welcome/hr/employee/all') !== false ? 'menu-active2' : '' }}">
                        <div class="d-flex align-items-center">
                            <span class="material-icons-outlined pe-2">list_alt</span>
                            <font class="pt-1">All Employees</font>
                        </div>
                    </a>

                    @if(auth()->user()->role == 1)
                        <a href="/welcome/hr/employee/new" class="list-group-item border-bottom list-group-item-action py-2 ripple d-flex align-items-center {{ Request::is('welcome/hr/employee/new') ? 'menu-active2' : '' }}">
                            <span class="material-icons-outlined pe-2">add</span>
                            <font class="pt-1">Add New Employee</font>
                        </a>
                    @endif
                </ul>

                @if(auth()->user()->role == 1)
                    <a aria-current="true"  href="#leave" aria-controls="leave" aria-expanded="true" class="list-group-item list-group-item-action py-2 ripple d-flex align-items-center justify-content-between {{ strpos(url()->current(), 'welcome/hr/leave') !== false ? 'bg-warning text-white' : '' }}">
                        <div class="d-flex align-items-center">
                            <span class="material-icons-outlined pe-2">mail</span>
                            <font class="pt-1">Leave Requests</font>
                        </div>

                        <div>
                            <span class="material-icons-outlined pt-2">keyboard_arrow_down</span>
                        </div>
                    </a>

                    <ul id="leave" class=" {{ strpos(url()->current(), 'welcome/hr/leave') !== false ? 'show' : '' }} list-group list-group-flush">
                        <a href="/welcome/hr/leave/received" class="list-group-item border-bottom list-group-item-action py-2 ripple d-flex align-items-center {{ Request::is('welcome/hr/leave/received') ? 'menu-active2' : '' }}">
                            <span class="material-icons-outlined pe-2">call_received</span>
                            <font class="pt-1">Received</font>
                        </a>

                        <a href="/welcome/hr/leave/managed" class="list-group-item border-bottom list-group-item-action py-2 ripple d-flex align-items-center {{ Request::is('welcome/hr/leave/managed') ? 'menu-active2' : '' }}">
                            <span class="material-icons-outlined pe-2">manage_history</span>
                            <font class="pt-1">Managed</font>
                        </a>
                    </ul>
                @endif

                @if(auth()->user()->role == 1)
                    <a aria-current="true"  href="#salary-grade" aria-controls="salary-grade" aria-expanded="true" class="list-group-item list-group-item-action py-2 ripple d-flex align-items-center justify-content-between {{ strpos(url()->current(), 'welcome/hr/salary-grade') !== false ? 'bg-warning text-white' : '' }}">
                        <div class="d-flex align-items-center">
                            <span class="material-icons-outlined pe-2">attach_money</span>
                            <font class="pt-1">Salary Grade</font>
                        </div>

                        <div>
                            <span class="material-icons-outlined pt-2">keyboard_arrow_down</span>
                        </div>
                    </a>

                    <ul id="salary-grade" class=" {{ strpos(url()->current(), 'welcome/hr/salary-grade') !== false ? 'show' : '' }} list-group list-group-flush">
                        <a href="/welcome/hr/salary-grade/list" class="list-group-item border-bottom list-group-item-action py-2 ripple d-flex align-items-center {{ Request::is('welcome/hr/salary-grade/list') ? 'menu-active2' : '' }}">
                            <span class="material-icons-outlined pe-2">list_alt</span>
                            <font class="pt-1">List Salary Grades</font>
                        </a>

                        <a href="/welcome/hr/salary-grade/new" class="list-group-item border-bottom list-group-item-action py-2 ripple d-flex align-items-center {{ Request::is('welcome/hr/salary-grade/new') ? 'menu-active2' : '' }}">
                            <span class="material-icons-outlined pe-2">add</span>
                            <font class="pt-1">Add New Salary Grade</font>
                        </a>
                    </ul>
                @endif
            </div>
      	</div>
    </nav>

	<nav id="main-navbar" class="navbar navbar-expand-lg navbar-light fixed-top bg-white border-bottom shadow-none">
      	<div class="container-fluid">
	        <div class="navbar-brand p-0" style="font-family: 'Lobster', cursive; font-size: 30px">
                <img src="{{ URL::asset('system-images/logo.png') }}" alt="logo" class="me-3 ms-2" height="40">
                HRMIS
            </div>

	        <ul class="navbar-nav ms-auto d-flex flex-row">
                <li class="nav-item">
                    <a href="/welcome/hr/employee/step-notifications" type="button" class="btn btn-transparent btn-floating me-2 shadow-sm">
                        @php
                            $checkNotif  = \DB::table('step_notifications')->where('read', 0)->get();
                        @endphp

                        <span class="material-icons-outlined pt-1 {{ iterator_count($checkNotif) > 0 ? 'text-danger' : '' }}">
                            {!! iterator_count($checkNotif) > 0 ? 'notification_important' : 'notifications' !!}
                        </span>
                    </a>
                </li>

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
			              		<a class="dropdown-item rounded-0 d-flex align-items-center" href="/welcome/hr/account-settings">
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

<script>
    $(document).ready(function() {
        $.ajax({ url: '/welcome/hr/stepNotif' });
    });
</script>
