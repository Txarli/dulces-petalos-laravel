<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dulces Pétalos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body class="bg-gray-100">

    <header class="bg-green-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">
                <a href="{{ url('/') }}"
                    class="focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-green-600">
                    Dulces Pétalos
                </a>
            </h1>
            <div class="flex items-center gap-6">
                @auth
                    <a href="{{ route('admin.plants.index') }}" class="hover:underline">Administrar catálogo</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="hover:underline ml-2">Cerrar sesión</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:underline">Iniciar sesión</a>
                @endauth

                <form action="{{ url('/buscar') }}" method="GET" class="flex">
                    <input type="text" name="q" placeholder="Buscar plantas..."
                        class="px-4 py-2 rounded-l bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-400">
                    <button type="submit"
                        class="px-4 py-2 bg-white text-green-600 rounded-r hover:bg-gray-200 flex items-center">
                        <i class="ph ph-magnifying-glass text-lg"></i>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <main class="container mx-auto py-8">
        @yield('content')
    </main>

</body>

</html>
