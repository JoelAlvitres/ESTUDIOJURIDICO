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

    <section class="py-16 bg-gradient-to-b from-gray-50 to-gray-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800 mb-4 font-serif tracking-tight">Nuestras Áreas de Práctica</h1>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-6"></div>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Ofrecemos asesoría legal especializada con excelencia profesional y compromiso ético para proteger sus derechos e intereses.
                </p>
            </div>

            @if(isset($areas) && $areas->isEmpty())
                <p class="text-center text-gray-600">No hay áreas de práctica publicadas en este momento.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($areas as $area)
                        <a href="{{ route('areas.show', $area->slug) }}" class="block bg-white rounded-xl shadow-lg overflow-hidden p-8 hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 hover:border-blue-200">
                            <div class="flex flex-col items-center justify-center mb-6">
                                {{-- Contenedor del ícono para un estilo consistente --}}
                                <div class="w-20 h-20 rounded-full bg-blue-50 text-blue-600 mb-5 flex items-center justify-center shadow-sm">
                                    @php
                                        $faClass = $iconMap[$area->icono] ?? 'fas fa-gavel';
                                    @endphp
                                    <i class="{{ $faClass }} text-3xl"></i>
                                </div>
                            </div>
                            <h3 class="text-2xl font-semibold text-gray-800 mb-3 text-center font-serif">{{ $area->nombre }}</h3>
                            <p class="text-gray-600 text-base leading-relaxed text-center">
                                {{ Str::limit(strip_tags($area->descripcion_corta ?: $area->contenido), 120) }}
                            </p>
                            <div class="mt-6 text-center">
                                <span class="text-blue-600 font-medium inline-flex items-center">
                                    Ver detalles
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection