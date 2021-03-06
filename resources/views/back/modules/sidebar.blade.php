<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-laugh-wink"></i>
		</div>
		<div class="sidebar-brand-text mx-3">MeMFIS</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item">
		<a class="nav-link" href="{{ route('dashboard.index') }}">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Master
	</div>

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link" href="{{ route('product.index') }}">
			<i class="fa fa-fw fa-box"></i>
			<span>Product</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="{{ route('order.index') }}">
			<i class="fa fa-fw fa-boxes"></i>
			<span>Order</span>
		</a>
	</li>
	@if (Auth::user()->roles_id == 3)
		<li class="nav-item">
			<a class="nav-link" href="{{ route('customer.index') }}">
				<i class="fa fa-fw fa-users"></i>
				<span>Customer</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{ route('employee.index') }}">
				<i class="fa fa-fw fa-user-circle"></i>
				<span>Employee</span>
			</a>
		</li>
	@endif

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
