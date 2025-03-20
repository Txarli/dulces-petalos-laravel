@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <!-- Botón Volver -->
        <div class="mb-4">
            <a href="{{ url('/') }}" class="text-green-600 hover:underline">&larr; Volver al listado</a>
        </div>

        @isset($plant)
            <div class="bg-white shadow-md rounded-lg overflow-hidden p-6 max-w-4xl mx-auto flex flex-col md:flex-row">
                <!-- Imagen -->
                <div class="md:w-1/2 flex justify-center">
                    <img src="{{ $plant->img_url }}" alt="{{ $plant->name }}" class="w-full md:w-96 h-96 object-cover rounded">
                </div>

                <!-- Información de la planta -->
                <div class="md:w-1/2 p-6">
                    <h1 class="text-4xl font-bold text-gray-800">{{ $plant->name }}</h1>
                    <p class="text-gray-500 italic text-lg">{{ $plant->binomial_name }}</p>
                    <p class="text-green-600 text-2xl font-bold mt-4">€{{ $plant->price }}</p>

                    <div class="mt-6 border-t pt-4">
                        <dl>
                            <div class="flex justify-between">
                                <dt class="font-semibold text-lg">Riegos por semana:</dt>
                                <dd class="text-lg">{{ $plant->waterings_per_week }}</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="font-semibold text-lg">Fertilizante recomendado:</dt>
                                <dd class="text-lg capitalize">
                                    {{ $plant->fertilizer_type == 'nitrogen' ? 'Nitrogenado' : 'Fosforado' }}</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="font-semibold text-lg">Altura:</dt>
                                <dd class="text-lg">{{ $plant->height_in_cm }} cm</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        @else
            <p class="text-center text-gray-500">No se encontró la planta solicitada.</p>
        @endisset
    </div>
@endsection
