

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
				<div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<nav class="greedys sidebar-horizantal">
							<ul class="list-inline-item list-unstyled links">
								@can('Administration')
									<li class="menu-title"><span>Authorization</span></li>
									<li class="submenu">
										<a href="{{ route('permission.index') }}"><i class="fe fe-home"></i> <span> Permissions</span> <span class="menu-arrow"></span></a>
									</li>
									<li class="submenu">
										<a href="{{ route('role.index') }}"><i class="fe fe-home"></i> <span> Roles</span> <span class="menu-arrow"></span></a>
									</li>
									<li class="submenu">
										<a href="{{ route('users.index') }}"><i class="fe fe-home"></i> <span> Users</span> <span class="menu-arrow"></span></a>
									</li>
								@endcan
							</ul>
							<!-- /Settings -->
						</nav>
						<ul class="sidebar-vertical ">
							<!-- Main -->

								<li>
									<a href="{{ route('index') }}"><i class="fe fe-user"></i> <span> Dashboard</span></a>									
								</li>
						
							@can('Service Management')
								<li class="menu-title"><span>Booking</span></li>
								<li>
									<a href="{{ route('booking.index') }}"><i class="fe fe-user"></i> <span> Booking List</span></a>									
								</li>
							@endcan

							@can('Service Management')
								<li class="menu-title"><span>Services</span></li>
								<li>
									<a href="{{ route('service.index') }}"><i class="fe fe-user"></i> <span>Pending Service</span></a>
									<a href="{{ route('service.complated') }}"><i class="fe fe-user"></i> <span>Completed Service</span></a>
									<a href="{{ route('service.create') }}"><i class="fe fe-home"></i> <span> Add Service</span></a>
								</li>
							@endcan

							@can('Administration')
								<li class="menu-title"><span>Authorization</span></li>
								<li>
									<a href="{{ route('permission.index') }}"><i class="fe fe-home"></i> <span> Permissions</span></a>
								</li>
								<li>
									<a href="{{ route('role.index') }}"><i class="fe fe-home"></i> <span> Roles</span></a>
								</li>
								<li>
									<a href="{{ route('users.index') }}"><i class="fe fe-user"></i> <span> Users</span></a>
								</li>
							@endcan
							
						</ul>
					</div>
				</div>
			</div>
			<!-- /Sidebar -->