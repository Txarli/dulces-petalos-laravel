<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dulces Pétalos</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body class="bg-gray-100">

    <header class="bg-gray-800 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">
                <a href="{{ route('admin.plants.index') }}" class="hover:underline">Dulces Pétalos — Admin</a>
            </h1>
            <nav class="space-x-4">
                <a href="{{ route('admin.plants.index') }}" class="hover:underline">Catálogo</a>
                <a href="{{ url('/') }}" class="hover:underline">Volver a la tienda</a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto py-8">
        @yield('content')
    </main>

</body>

</html>
