<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pesan Menu - Warung Kopi</title>
    <link href="{{ asset('css/customer-style.css') }}" rel="stylesheet">
</head>
<body>
    <nav>
        <h2>Warung Kopi AnB</h2>
        <a href="{{ route('customer.cart') }}">Keranjang</a>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer>
        &copy; {{ date('Y') }} Warung Kopi AnB
    </footer>
</body>
</html>