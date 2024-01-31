<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('customer.index') }}" aria-expanded="false"><i class="me-3 fas fa-home"
                            aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('customer.kantin') }}" aria-expanded="false">
                        <i class="me-3 fas fa-coffee" aria-hidden="true"></i><span class="hide-menu">Kantin</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('customer.keranjang') }}" aria-expanded="false">
                        <i class="me-3 fas fa-shopping-cart" aria-hidden="true"></i><span
                            class="hide-menu">Keranjang</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route('customer.riwayat.transaksi') }}" aria-expanded="false">
                            <i class="me-3   fas fa-paste" aria-hidden="true"></i><span class="hide-menu">Riwayat
                                Transaksi</span></a>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route('customer.riwayat.topup') }}" aria-expanded="false">
                            <i class="me-3  fas fa-clipboard" aria-hidden="true"></i><span class="hide-menu">Riwayat
                                TopUp</span></a>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route('customer.riwayat.withdrawal') }}" aria-expanded="false">
                            <i class="me-3  fas fa-clipboard-check" aria-hidden="true"></i><span class="hide-menu">Riwayat
                                Withdrawal</span></a>
                    </li>
                <li class="sidebar-item" onclick="return confirm('Anda Yakin Ingin Logout')"> <a
                        class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('logout') }}"
                        aria-expanded="false"><i class="me-3 fa fas fa-sign-out-alt" aria-hidden="true"></i><span
                            class="hide-menu">Logout</span></a></li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
