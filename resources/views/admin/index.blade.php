<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
</head>
<body class="bg-gray-100">
    <div class="flex">

        <nav id="sidebar" class="w-64 bg-gray-800 text-white h-screen fixed">
            <div class="p-4">
                <h2 class="text-center text-xl font-bold">Menu Navigasi</h2>
                <ul class="mt-4">
                    <li class="mb-2">
                        <a class="flex items-center p-2 hover:bg-gray-700 rounded" href="{{ route('places.index') }}">
                            <i class="fas fa-plus mr-2"></i> Tambah Wisata
                        </a>
                    </li>
                    <li class="mb-2">
                        <a class="flex items-center p-2 hover:bg-gray-700 rounded" href="{{ route('tourist_info.index') }}">
                            <i class="fas fa-plus-circle mr-2"></i> Tambah Informasi
                        </a>
                    </li>
                    <li class="mb-2">
                        <a class="flex items-center p-2 hover:bg-gray-700 rounded" href="{{ route('home.index') }}">
                            <i class="fas fa-home mr-2"></i> Home
                        </a>
                    </li>
                    <li class="mb-2">
                        <a class="flex items-center p-2 hover:bg-gray-700 rounded" href="{{ route('informasi.index') }}">
                            <i class="fas fa-info-circle mr-2"></i> Informasi
                        </a>
                    </li>
                    <li class="mb-2">
                        <a class="flex items-center p-2 hover:bg-gray-700 rounded" href="{{ route('map.index') }}">
                            <i class="fas fa-map mr-2"></i> Maps
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="flex-1 ml-64 p-6">
            <div class="flex justify-between items-center border-b pb-4 mb-4">
                <h1 class="text-2xl font-bold">Dashboard Admin</h1>
            </div>
            <p>Selamat datang di dashboard admin! Anda dapat mengelola informasi wisata di sini.</p>

            <div class="flex justify-end mt-4">
                @auth
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="flex items-center bg-red-500 text-white px-4 py-2 rounded">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Login</a>
                @endauth
            </div>
        </div>
    </div>

</body>
</html>