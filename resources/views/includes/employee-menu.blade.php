<header>
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white border-end" data-mdb-perfect-scrollbar='true'>
		<div class="mx-3 mt-4 mb-3 text-center px-3 py-2 border rounded fw-bold">
            Employee
        </div>

		<div class="position-sticky">
        	<div class="list-group list-group-flush">
                <a href="/welcome/employee/dashboard" class="list-group-item list-group-item-action py-2 ripple d-flex align-items-center {{ Request::is('welcome/employee/dashboard') ? 'bg-warning text-white' : '' }}">
                    <span class="material-icons-outlined pe-2">dashboard</span>
                    <font class="pt-1">Dashboard</font>
                </a>

                <a aria-current="true"  href="#leave" aria-controls="leave" aria-expanded="true" class="list-group-item list-group-item-action py-2 ripple d-flex align-items-center justify-content-between {{ strpos(url()->current(), 'welcome/employee/leave') !== false ? 'bg-warning text-white' : '' }}">
                    <div class="d-flex align-items-center">
                        <span class="material-icons-outlined pe-2">mail</span>
                        <font class="pt-1">Leave Requests</font>
                    </div>

                    <div>
                        <span class="material-icons-outlined pt-2">keyboard_arrow_down</span>
                    </div>
                </a>

                <ul id="leave" class=" {{ strpos(url()->current(), 'welcome/employee/leave') !== false ? 'show' : '' }} list-group list-group-flush">
                    <a href="/welcome/employee/leave/list" class="list-group-item border-bottom list-group-item-action py-2 ripple d-flex align-items-center {{ Request::is('welcome/employee/leave/list') ? 'menu-active2' : '' }}">
                        <span class="material-icons-outlined pe-2">view_list</span>
                        <font class="pt-1">My Requests</font>
                    </a>

                    <a href="/welcome/employee/leave/new" class="list-group-item border-bottom list-group-item-action py-2 ripple d-flex align-items-center {{ Request::is('welcome/employee/leave/new') ? 'menu-active2' : '' }}">
                        <span class="material-icons-outlined pe-2">add</span>
                        <font class="pt-1">New Request</font>
                    </a>
                </ul>
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
                <li class="nav-item dropdown">
	          		<div class="d-flex align-items-center">
						<a class="nav-link dropdown-toggle text-dark d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
							<div class="small text-truncate forName">{{ ucwords(auth()->user()->employeeTable->employeeInfo->firstname . ' ' . auth()->user()->employeeTable->employeeInfo->middlename . ' ' . auth()->user()->employeeTable->employeeInfo->lastname) }}</div>
						</a>

	          			<ul class="dropdown-menu dropdown-menu-end rounded-0 border" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item rounded-0 d-flex align-items-center" href="/welcome/employee/view-profile">
                                    <span class="material-icons-outlined pe-2">account_circle</span>
                                  <font class="pt-1">View Profile</font>
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
