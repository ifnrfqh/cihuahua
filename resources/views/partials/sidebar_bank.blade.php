
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('bank.index')}}" aria-expanded="false"><i class="me-3 fas fa-home"
                            aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('bank.topup') }}" aria-expanded="false">
                        <i class="me-3 fas fa-hand-holding-usd" aria-hidden="true"></i><span
                            class="hide-menu">Top Up</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('bank.withdrawal') }}" aria-expanded="false">
                        <i class="me-3  far fa-credit-card" aria-hidden="true"></i><span
                            class="hide-menu">Withdrawal</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('topup.harian') }}" aria-expanded="false">
                        <i class="me-3  fas fa-clipboard-list" aria-hidden="true"></i><span
                            class="hide-menu">Laporan TopUp</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('withdrawal.harian') }}" aria-expanded="false">
                        <i class="me-3  fas fa-sticky-note" aria-hidden="true"></i><span
                            class="hide-menu">Laporan Withdrawal</span></a>
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