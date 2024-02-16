<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('admin/dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ Auth::guard('admin')->user()->username }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{url('approve')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Approval</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{url('admin/buyout')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Buy-Out</span></a>
    </li>



</ul>
<!-- End of Sidebar -->
