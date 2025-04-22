
<nav class="navbar navbar-dark bg-dark px-4">
    <a class="navbar-brand text-white" href="#">Admin Panel</a>
    <div class="d-flex align-items-center">
        <div class="dropdown">
            <a class="dropdown-toggle text-decoration-none text-white me-3" href="#" role="button" data-bs-toggle="dropdown">
                {{ Auth::guard('admin')->user()->name }}
                <i class="fa-solid fa-user text-white"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item" type="submit">Đăng xuất</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

</nav>