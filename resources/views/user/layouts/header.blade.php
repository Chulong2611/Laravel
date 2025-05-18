<header>
    <div class="nav-bar container">
        <div class="header-inner">

            <!--phan logo -->
            <div class="header-col header-left">
                <a href="{{ route('user.home') }}"><img src="{{ asset('storage/uploads/logo/logo1.png') }}" alt="logo" class="img-fluid"></a>
            </div>

            <!-- search bar
            <div class="header-col header-middle">
                <form class="search-bar" action="{{ route('search') }}" method="GET">
                    <input class="form-control" name="keyword" type="search" placeholder="Search for products">
                    <div class="category-select-wrapper">
                        <div class="drop-list" data-val>
                            <span class="cat-name" data-val="">All</span>
                            <span class="fa-solid fa-chevron-down"></span>
                            <ul class="category-list">
                                <li class="empty-cat" data-val>All</li>
                                <li class="cat1" data-val>All</li>
                                
                            </ul>
                        </div>
                    </div>
                    <button class="btn" type="submit" title="Search"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div> -->

        <!-- search bar -->
<div class="header-col header-middle">
    <form class="search-bar" action="{{ route('search') }}" method="GET">
        <input class="form-control" name="keyword" type="search" placeholder="Search for products">

        <div class="category-select-wrapper">
            <input type="hidden" name="category_id" id="selected-category-id" value="">

            <div class="drop-list" id="category-dropdown">
                <span class="cat-name" id="selected-category-name" data-val="">Tất cả</span>
                <span class="fa-solid fa-chevron-down"></span>
            </div>

            <ul class="category-list" id="category-list">
                <li data-id="" class="category-item">Tất cả</li>
                @foreach($categories as $category)
                    <li data-id="{{ $category->id }}" class="category-item">
                        {{ $category->name }}
                    </li>
                @endforeach
            </ul>
        </div>

        <button class="btn" type="submit" title="Search">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </form>
</div>



            <!-- cart, sp yeu thich, nguoi dung-->
            <div class="header-col header-right">
                <div class="top-btn">
                    <a href=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                        </svg></a>
                    <span class="top-btn-span">0</span>
                </div>
                <div class="top-btn">
                    <a href=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
                        </svg></a>
                    <span class="top-btn-span">0</span>
                </div>
                <div class="top-btn">
                    <a href="" aria-label="Login/Register"><svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <path
                                d="M399 384.2C376.9 345.8 335.4 320 288 320l-64 0c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" />
                        </svg></a>
                    <ul class="top-btn-menu">
                        @guest
                        <!-- Nếu chưa đăng nhập -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                        @else
                        <!-- Nếu đã đăng nhập -->
                        <div class="nav-item">
                            <li><span class="nav-link">{{ Auth::user()->username ?? Auth::user()->name ?? 'Tài khoản' }}</span></li>
                            <hr>
                            <li><a class="nav-link" href="{{ route('user.profile') }}">Thông tin cá nhân</a></li>

                            <li><a class="nav-link" href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Đăng xuất
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </div>
                    </ul>
                    @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dropdown = document.getElementById('category-dropdown');
        const list = document.getElementById('category-list');
        const categoryInput = document.getElementById('selected-category-id');
        const categoryName = document.getElementById('selected-category-name');
        const items = document.querySelectorAll('.category-item');

        dropdown.addEventListener('click', function () {
            list.classList.toggle('show');
        });

        items.forEach(item => {
            item.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const name = this.textContent;
                categoryInput.value = id;
                categoryName.textContent = name;
                list.classList.remove('show');
            });
        });

        // Đóng dropdown khi click ngoài
        document.addEventListener('click', function (e) {
            if (!dropdown.contains(e.target)) {
                list.classList.remove('show');
            }
        });
    });
</script>
