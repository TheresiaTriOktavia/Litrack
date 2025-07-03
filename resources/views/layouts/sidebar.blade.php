<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <!-- Device Management Section -->
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#device-management" aria-expanded="false"
                aria-controls="device-management">
                <i class="mdi mdi-devices menu-icon"></i>
                <span class="menu-title">Device Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="device-management">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('device.index') }}">
                            All Devices
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('location.index') }}">
                            Location
                        </a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="{{ route('regdev.index') }}">
                            Registered Device
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Charts Section -->
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Charts</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="pages/charts/chartjs.html">
                            ChartJs
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- User Management Section -->
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">User Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="pages/samples/login.html">
                            Users Data
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/samples/register.html">
                            Role Users
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Documentation -->
        <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
    </ul>
</nav>