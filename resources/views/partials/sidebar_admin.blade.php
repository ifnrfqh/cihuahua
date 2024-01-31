

<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('admin.index')}}" aria-expanded="false"><i class="me-3 fas fa-home"
                            aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('data.index')}}" aria-expanded="false">
                        <i class="me-3 fa fa-user" aria-hidden="true"></i><span
                            class="hide-menu">Data User</span></a>
                </li>
                <li class="sidebar-item" onclick="return confirm('Anda Yakin Ingin Logout')"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('logout')}}" aria-expanded="false"><i class="me-3 fa fas fa-sign-out-alt"
                            aria-hidden="true"></i><span class="hide-menu">Logout</span></a></li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>