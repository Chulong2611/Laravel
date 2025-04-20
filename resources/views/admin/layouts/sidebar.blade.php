<!--tự động highlight menu sidebar tương ứng-->

<aside class="bg-light border-end p-3" style="width: 240px; min-height: 100vh;">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" 
               href="{{ route('admin.dashboard') }}">
                <i class="fa-solid fa-gauge-high me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.users') ? 'active' : '' }}" 
               href="{{ route('admin.users') }}">
                <i class="fa-solid fa-users me-2"></i> Users
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.products') ? 'active' : '' }}" 
               href="{{ route('admin.products') }}">
                <i class="fa-solid fa-boxes-stacked me-2"></i> Products
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.orders') ? 'active' : '' }}" 
               href="{{ route('admin.orders') }}">
                <i class="fa-solid fa-receipt me-2"></i> Orders
            </a>
        </li>
    </ul>
</aside>

