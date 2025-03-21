<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dulces Pétalos</title>
    @vite('resources/css/app.css')
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
            <form action="{{ url('/buscar') }}" method="GET" class="flex">
                <input type="text" name="q" placeholder="Buscar plantas..."
                    class="px-4 py-2 rounded-l bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-400">
                <button type="submit"
                    class="px-4 py-2 bg-white text-green-600 rounded-r hover:bg-gray-200 flex items-center">
                    <i class="ph ph-magnifying-glass text-lg"></i>
                </button>
            </form>
        </div>
    </header>

    <main class="container mx-auto py-8">
        @yield('content')
    </main>

</body>

</html>
