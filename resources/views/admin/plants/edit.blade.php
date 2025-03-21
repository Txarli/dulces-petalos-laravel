@extends('layouts.admin')

@section('content')
    <div class="max-w-2xl mx-auto py-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Editar Planta</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.plants.update', $plant) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-semibold" for="name">Nombre común</label>
                <input type="text" name="name" id="name" value="{{ old('name', $plant->name) }}"
                    class="w-full px-4 py-2 rounded border">
            </div>

            <div>
                <label class="block font-semibold" for="binomial_name">Nombre científico</label>
                <input type="text" name="binomial_name" id="binomial_name"
                    value="{{ old('binomial_name', $plant->binomial_name) }}" class="w-full px-4 py-2 rounded border">
            </div>

            <div>
                <label class="block font-semibold" for="price">Precio (€)</label>
                <input type="number" name="price" id="price" value="{{ old('price', $plant->price) }}" step="0.01"
                    class="w-full px-4 py-2 rounded border">
            </div>

            <div>
                <label class="block font-semibold" for="image">Nueva imagen (JPG, opcional)</label>
                <input type="file" name="image" id="image" accept=".jpg,.jpeg"
                    class="w-full px-4 py-2 rounded border">
                <p class="text-sm text-gray-600 mt-1">Imagen actual:</p>
                <img src="{{ $plant->img_url }}" alt="{{ $plant->name }}" class="mt-2 w-48 h-48 object-cover rounded">
            </div>

            <div>
                <label class="block font-semibold" for="waterings_per_week">Riegos por semana</label>
                <input type="number" name="waterings_per_week" id="waterings_per_week"
                    value="{{ old('waterings_per_week', $plant->waterings_per_week) }}"
                    class="w-full px-4 py-2 rounded border">
            </div>

            <div>
                <label class="block font-semibold" for="fertilizer_type">Tipo de fertilizante</label>
                <select name="fertilizer_type" id="fertilizer_type" class="w-full px-4 py-2 rounded border">
                    <option value="">Selecciona una opción</option>
                    <option value="nitrogen"
                        {{ old('fertilizer_type', $plant->fertilizer_type) === 'nitrogen' ? 'selected' : '' }}>Nitrogenado
                    </option>
                    <option value="phosphorus"
                        {{ old('fertilizer_type', $plant->fertilizer_type) === 'phosphorus' ? 'selected' : '' }}>Fosforado
                    </option>
                </select>
            </div>

            <div>
                <label class="block font-semibold" for="height_in_cm">Altura (cm)</label>
                <input type="number" name="height_in_cm" id="height_in_cm"
                    value="{{ old('height_in_cm', $plant->height_in_cm) }}" class="w-full px-4 py-2 rounded border">
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.plants.index') }}"
                    class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancelar</a>
                <button type="submit"
                    class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Actualizar</button>
            </div>
        </form>
    </div>
@endsection
