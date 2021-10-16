<!-- Left Sidebar Start -->
<div id="leftsidebar" class="sidebar">
    <div class="sidebar-scroll">
        <nav id="leftsidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu">
                <li class="heading">Main</li>
                <li class="{{ Request::is('admin') ? 'active' : ''}}"><a href="{{ route('admin.dashboard') }}"><i class="icon-home"></i><span>Dashboard</span></a></li>
                <li class="heading">Master</li>
                @role('superadmin')
                    <li class="middle {{ (Request::is('admin/role*') || Request::is('admin/users*'))  ? 'active' : ''}}">
                        <a href="#uiElements" class="has-arrow"><i class="icon-users"></i><span>Manajemen Users</span></a>
                        <ul>
                            <li class="{{ (Request::is('admin/role*'))  ? 'active' : ''}}"><a href="{{ route('role.index') }}"><span>Role</span></a></li>
                            <li class="{{ (Request::is('admin/users*'))  ? 'active' : ''}}"><a href="{{ route('users.index') }}"><span>Users</span></a></li>
                            <li class="{{ (Request::is('admin/users/role-permission*'))  ? 'active' : ''}}"><a href="{{ route('users.roles_permission') }}"><span>Role Permission</span></a></li>
                        </ul>
                    </li>
                @endrole

                @canany(['all', 'show penulis'])
                <li class="{{ Request::is('admin/penulis*') ? 'active' : ''}}"><a href="{{ url('admin/penulis') }}"><i class="fa fa-book"></i><span>Penulis</span></a></li>
                @endcanany

                @canany(['all', 'show buku'])
                <li class="{{ Request::is('admin/buku*') ? 'active' : ''}}"><a href="{{ url('admin/buku') }}"><i class="fa fa-book"></i><span>Buku</span></a></li>
                @endcanany
            </ul>
        </nav>
    </div>
</div>
<!-- Left Sidebar End -->