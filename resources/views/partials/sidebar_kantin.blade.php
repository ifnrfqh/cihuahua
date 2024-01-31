<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('kantin.index')}}" aria-expanded="false"><i class="me-3 fas fa-home"
                            aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('kategori.index')}}" aria-expanded="false">
                        <i class="me-3  fas fa-sitemap" aria-hidden="true"></i><span
                            class="hide-menu">Data Kategori</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('produk.index')}}" aria-expanded="false">
                        <i class="me-3  fas fa-coffee" aria-hidden="true"></i><span
                            class="hide-menu">Data Produk</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('kantin.laporan')}}" aria-expanded="false">
                        <i class="me-3  fas fa-clipboard-list" aria-hidden="true"></i><span
                            class="hide-menu">Laporan</span></a>
                </li>
                <li class="sidebar-item"  onclick="return confirm('Anda Yakin Ingin Logout')"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('logout')}}" aria-expanded="false"><i class="me-3 fa fas fa-sign-out-alt"
                            aria-hidden="true"></i><span class="hide-menu">Logout</span></a></li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>