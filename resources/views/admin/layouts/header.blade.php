<nav class="navbar navbar-dark bg-dark px-4">
    <a class="navbar-brand text-white" href="#">Admin Panel</a>
    @auth('admin')
    <div class="d-flex align-items-center gap-2">
        <span class="text-white">{{ Auth::guard('admin')->user()->name }}</span>
        <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
        </form>
    </div>
    @endauth
</nav>