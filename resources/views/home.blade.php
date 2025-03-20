@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <!-- Listado de productos -->
        @isset($plants)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($plants as $plant)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="{{ $plant->img_url }}" alt="{{ $plant->name }}" class="w-full h-48 object-cover aspect-square">
                        <div class="p-4">
                            <h2 class="text-lg font-semibold text-gray-800">{{ $plant->name }}</h2>
                            <p class="text-gray-500 italic">{{ $plant->binomial_name }}</p>
                            <p class="text-green-600 font-bold mt-2">€{{ $plant->price }}</p>
                            <a href="{{ url('/plant/' . $plant->id) }}"
                                class="block mt-4 bg-green-500 text-white text-center py-2 rounded hover:bg-green-600">Ver
                                más</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500">No hay plantas disponibles en este momento.</p>
        @endisset
    </div>
@endsection
