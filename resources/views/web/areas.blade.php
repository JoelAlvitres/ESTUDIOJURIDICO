{{-- resources/views/web/areas.blade.php --}}

@extends('layouts.app')

@section('title', 'Áreas de Práctica - Estudio Rodas Elías')

@section('content')
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <h1 class="text-4xl font-bold text-gray-800 text-center mb-8">Nuestras Áreas de Práctica</h1>
            <p class="text-lg text-gray-600 text-center mb-12">Ofrecemos asesoría legal especializada en diversas ramas del derecho para satisfacer las necesidades de nuestros clientes.</p>

            @if(isset($areas) && $areas->isEmpty())
                <p class="text-center text-gray-600">No hay áreas de práctica publicadas en este momento.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($areas as $area)
                        <a href="{{ route('areas.show', $area->slug) }}" class="block bg-white rounded-lg shadow-lg overflow-hidden p-6 hover:shadow-xl transition-shadow duration-300">
                            <div class="flex flex-col items-center justify-center mb-4">
                                @if($area->icono)
                                    <!-- Aquí asumimos que $area->icono es una clase de Heroicons o similar -->
                                    <!-- Asegúrate de tener 'blade-ui-kit/blade-heroicons' instalado y configurado -->
                                    <x-heroicon-o-{{ Str::after($area->icono, 'heroicon-o-') }} class="w-16 h-16 mx-auto text-blue-600 mb-4"/>
                                @else
                                    <!-- Icono de placeholder si no hay icono definido -->
                                    <x-heroicon-o-cube class="w-16 h-16 mx-auto text-gray-400 mb-4"/>
                                @endif
                            </div>
                            <h3 class="text-2xl font-semibold text-blue-700 mb-2">{{ $area->nombre }}</h3>
                            <p class="text-gray-700 text-base leading-relaxed">{{ Str::limit(strip_tags($area->descripcion_corta ?: $area->descripcion_completa), 120) }}</p>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
