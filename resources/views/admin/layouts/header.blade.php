        <!-- Header -->
        <header class="header">
            <div class="d-flex justify-content-between align-items-center w-100">
                <div class="d-flex align-items-center gap-3">
                    <!-- Mobile Sidebar Toggle Button -->
                    <button class="mobile-sidebar-toggle d-lg-none" type="button" onclick="toggleSidebar()">
                        <i class="bi bi-list"></i>
                    </button>

                    <div>
                        <h4 class="mb-0">Dashboard</h4>
                        <small class="text-muted">Welcome back, {{ auth()->user()->first_name }}!</small>
                    </div>
                </div>
                
                <div class="d-flex align-items-center gap-3">
                    <!-- <button class="theme-toggle" onclick="toggleTheme()">
                        <i class="bi bi-moon-fill" id="theme-icon"></i>
                    </button> -->

                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{ url('public/'.auth()->user()->profile_image) }}"
                                 width="32" height="32"
                                 alt="{{ auth()->user()->full_name }}"
                                 class="rounded-circle me-2"
                                 style="object-fit: cover;">
                            <span>{{ auth()->user()->full_name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('admin.profile.index') }}">
                                <i class="bi bi-person me-2"></i>My Profile
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </header>
