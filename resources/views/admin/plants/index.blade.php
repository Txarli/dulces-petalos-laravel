@extends('layouts.admin')

@section('content')
    <div class="container mx-auto py-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Gestión del Catálogo</h2>
            <a href="{{ route('admin.plants.create') }}"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Nueva Planta</a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white rounded shadow overflow-hidden">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="text-left px-6 py-3">Planta</th>
                    <th class="text-left px-6 py-3">Nombre científico</th>
                    <th class="text-left px-6 py-3">Precio</th>
                    <th class="text-left px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($plants as $plant)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-6 py-4 flex items-center gap-4">
                            <img src="{{ $plant->img_url }}" alt="{{ $plant->name }}"
                                class="w-10 h-10 rounded-full object-cover">
                            <span>{{ $plant->name }}</span>
                        </td>
                        <td class="px-6 py-4 italic align-middle">{{ $plant->binomial_name }}</td>
                        <td class="px-6 py-4 align-middle">€{{ $plant->price }}</td>
                        <td class="px-6 py-4 align-middle">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.plants.edit', $plant) }}"
                                    class="text-blue-600 hover:text-blue-800 flex items-center gap-1">
                                    <i class="ph ph-pencil-simple"></i>
                                    Editar
                                </a>
                                <form action="{{ route('admin.plants.destroy', $plant) }}" method="POST"
                                    onsubmit="return confirm('¿Eliminar esta planta?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 flex items-center gap-1">
                                        <i class="ph ph-trash"></i>
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">No hay plantas en el catálogo.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
