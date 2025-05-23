<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

    {{-- Custom CSS --}}
    @vite(['resources/css/admin.css', 'resources/js/app.js'])
</head>
<body>

    {{-- Navbar --}}
    @include('admin.layouts.header')

    <div class="d-flex">
        {{-- Sidebar --}}
        @include('admin.layouts.sidebar')

        {{-- Main content --}}
        <main class="flex-grow-1 p-4 bg-white">
            @yield('content')
        </main>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    setTimeout(function() {
        const thongbao = document.getElementById('success-alert');
        if (thongbao) {
            const bsAlert = bootstrap.Alert.getOrCreateInstance(thongbao);
            bsAlert.close();
        }
    }, 3000);
</script>
</body>
</html>
