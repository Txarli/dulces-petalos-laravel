<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dulces Pétalos</title>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
</head>

<body class="bg-gray-100">

    <header class="bg-green-600 text-white p-4">
        <div class="container mx-auto">
            <h1 class="text-2xl font-bold">
                <a href="{{ url('/') }}"
                    class="focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-green-600">
                    Dulces Pétalos
                </a>
            </h1>
        </div>
    </header>

    <main class="container mx-auto py-8">
        @yield('content')
    </main>

</body>

</html>
