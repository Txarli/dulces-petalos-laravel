@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto bg-white shadow-md rounded px-8 py-6 mt-10">
        <h2 class="text-2xl font-bold text-center text-green-700 mb-6">Iniciar sesión</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                <input type="email" name="email" id="email" required autofocus
                    class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" name="password" id="password" required
                    class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Entrar
                </button>
                <a href="/" class="text-sm text-green-600 hover:underline">Volver al inicio</a>
            </div>
        </form>
    </div>
@endsection
