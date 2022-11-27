<!-- ==================================== ——— LEFT SIDEBAR WITH OUT FOOTER ===================================== -->
<aside class="left-sidebar sidebar-dark" id="left-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand"> <a href="{{url('/')}}"> <img src="{{url('/storage/theme/images/logo.png')}}" alt="Mono"> <span
                    class="brand-name">Anubhav</span> </a> </div> <!-- begin sidebar scrollbar -->
        <div class="sidebar-left" data-simplebar style="height: 100%;">
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <li> <a class="sidenav-item-link" href="{{route('dashboard.index')}}"> <i
                    class="mdi mdi-monitor-dashboard"></i> <span class="nav-text">
                    Dashboard</span> </a> </li>
                <li> <a class="sidenav-item-link" href="{{route('user.index')}}"> <i
                    class="mdi mdi-account-group"></i> <span class="nav-text">
                    User</span> </a> </li>

            </ul>
        </div>
        <div class="sidebar-footer">
            <div class="sidebar-footer-content">
                <ul class="d-flex">
                    <li> <a href="{{route('user.profile-update')}}" data-toggle="tooltip" title="Profile settings"><i
                                class="mdi mdi-settings"></i></a> </li>
                    <li> <a href="#" data-toggle="tooltip" title="No chat messages"><i
                                class="mdi mdi-chat-processing"></i></a> </li>
                </ul>
            </div>
        </div>
    </div>
</aside>
