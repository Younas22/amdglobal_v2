<div class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard.index') }}" class="sidebar-brand">
            <i class="bi bi-airplane"></i> {{getSetting('business_name', 'main', 'Default Title')}}
        </a>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-item">
            <a href="{{ route('admin.dashboard.index') }}" class="nav-link {{ request()->routeIs('admin.dashboard*') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </a>
        </div>

        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('admin.bookings*') ? 'active' : '' }}" data-bs-toggle="dropdown">
                <i class="bi bi-calendar-check"></i>
                Bookings
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('admin.bookings.all') }}"><i class="bi bi-list-ul"></i>All Bookings</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.bookings.cancelled-refunds') }}"><i class="bi bi-x-circle"></i>Cancelled/Refunds</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.bookings.pending-confirmations') }}"><i class="bi bi-clock"></i>Pending Confirmations</a></li>
            </ul>
        </div>

        <!-- <div class="nav-item">
            <a href="{{ route('admin.customers.index') }}" class="nav-link {{ request()->routeIs('admin.customers*') ? 'active' : '' }}">
                <i class="bi bi-people"></i>
                Customers
            </a>
        </div> -->

    <div class="nav-item">
        <a href="{{ route('admin.visa-requests.visaindex') }}" class="nav-link {{ request()->routeIs('admin.visa-requests*') ? 'active' : '' }}">
            <i class="bi bi-passport"></i>
            Visa Requests
        </a>
    </div>

        <div class="nav-item">
            <a href="{{ route('admin.travel-partners.index') }}" class="nav-link {{ request()->routeIs('admin.travel-partners*') ? 'active' : '' }}">
                <i class="bi bi-building"></i>
                Travel Partners
            </a>
        </div>

        <div class="nav-item">
            <a href="{{ route('admin.currencies.index') }}" class="nav-link {{ request()->routeIs('admin.currencies*') ? 'active' : '' }}">
                <i class="bi bi-currency-exchange"></i>
                Currencies
            </a>
        </div>

        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('admin.content*') || request()->routeIs('admin.pages*') || request()->routeIs('admin.menus*') ? 'active' : '' }}" data-bs-toggle="dropdown">
                <i class="bi bi-file-earmark-text"></i>
                Content Management
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item {{ request()->routeIs('admin.pages*') ? 'active' : '' }}" href="{{ route('admin.pages.index') }}">
                    <i class="bi bi-file-earmark-richtext"></i>Pages Management
                </a></li>
                <li><a class="dropdown-item {{ request()->routeIs('admin.content.blog*') ? 'active' : '' }}" href="{{ route('admin.content.blog.index') }}">
                    <i class="bi bi-journal-text"></i>Blog Management
                </a></li>
                <li><a class="dropdown-item {{ request()->routeIs('admin.menus*') ? 'active' : '' }}" href="{{ route('admin.menus.index') }}">
                    <i class="bi bi-menu-app"></i>Menu Management
                </a></li>
                <li><a class="dropdown-item {{ request()->routeIs('admin.content.newsletter.subscribers*') ? 'active' : '' }}" href="{{ route('admin.content.newsletter.subscribers') }}">
                    <i class="bi bi-people-fill"></i>Newsletter Subscribers
                </a></li>
            </ul>
        </div>

        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('admin.settings*') ? 'active' : '' }}" data-bs-toggle="dropdown">
                <i class="bi bi-gear"></i>
                Settings
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item {{ request()->routeIs('admin.settings.website*') ? 'active' : '' }}" href="{{ route('admin.settings.website') }}">
                    <i class="bi bi-globe"></i>Website Settings
                </a></li>
                <li><a class="dropdown-item {{ request()->routeIs('admin.settings.email*') ? 'active' : '' }}" href="{{ route('admin.settings.email') }}">
                    <i class="bi bi-envelope-at"></i>Email Settings
                </a></li>
                <li><a class="dropdown-item {{ request()->routeIs('admin.settings.payment*') ? 'active' : '' }}" href="{{ route('admin.settings.payment') }}">
                    <i class="bi bi-wallet2"></i>Payment Methods
                </a></li>
            </ul>
        </div>

        <!-- Quick Actions Section -->
        <div class="nav-section-divider">
            <span class="nav-section-title p-2">Quick Actions</span>
        </div>

        <div class="nav-item">
            <a href="{{ route('admin.pages.create') }}" class="nav-link quick-action">
                <i class="bi bi-plus-circle"></i>
                Add New Page
            </a>
        </div>

        <div class="nav-item">
            <a href="{{ route('admin.content.blog.create') }}" class="nav-link quick-action">
                <i class="bi bi-pencil-square"></i>
                Write New Post
            </a>
        </div>

        <div class="nav-item">
            <a href="{{ route('admin.menus.create') }}" class="nav-link quick-action">
                <i class="bi bi-menu-button-wide"></i>
                Add Menu Item
            </a>
        </div>
    </nav>
</div>
