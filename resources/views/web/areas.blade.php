{{-- resources/views/web/areas.blade.php --}}

@extends('layouts.app')

@section('title', 'Áreas de Práctica - Estudio Rodas Elías')

@section('content')
    {{-- Incluye Font Awesome a través de CDN para que los íconos se muestren correctamente --}}
    @push('head')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    @endpush

    {{-- Mapeo de Heroicons a Font Awesome para compatibilidad --}}
    @php
        $iconMap = [
            'heroicon-o-document-text' => 'fas fa-file-alt',
            'heroicon-o-user-group' => 'fas fa-users',
            'heroicon-o-scale' => 'fas fa-balance-scale',
            'heroicon-o-cube' => 'fas fa-cube',
            'heroicon-o-building-office-2' => 'fas fa-city',
            'heroicon-o-briefcase' => 'fas fa-briefcase',
            'heroicon-o-banknotes' => 'fas fa-hand-holding-usd',
            'heroicon-o-landmark' => 'fas fa-landmark',
            'heroicon-o-shield-check' => 'fas fa-shield-alt',
            'heroicon-o-gavel' => 'fas fa-gavel',
            'heroicon-o-lock-closed' => 'fas fa-lock',
        ];
    @endphp

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
                                {{-- Contenedor del ícono para un estilo consistente --}}
                                <div class="w-16 h-16 rounded-full bg-blue-100 text-blue-600 mb-4 flex items-center justify-center shadow-md">
                                    {{-- Lógica para obtener el ícono de Font Awesome del mapeo --}}
                                    @php
                                        // Obtiene la clase de Font Awesome, o usa un ícono genérico si no se encuentra en el mapa
                                        $faClass = $iconMap[$area->icono] ?? 'fas fa-gavel';
                                    @endphp
                                    <i class="{{ $faClass }} text-2xl"></i>
                                </div>
                            </div>
                            <h3 class="text-2xl font-semibold text-blue-700 mb-2">{{ $area->nombre }}</h3>
                            <p class="text-gray-700 text-base leading-relaxed">{{ Str::limit(strip_tags($area->descripcion_corta ?: $area->contenido), 120) }}</p>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
