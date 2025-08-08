{{-- resources/views/web/novedades.blade.php --}}
@extends('layouts.app')

@section('title', 'Novedades - Estudio Rodas Elías')

@section('content')
    <section class="py-16 bg-gradient-to-b from-gray-50 to-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Encabezado consistente con otras páginas --}}
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800 mb-4 font-serif tracking-tight">Últimas Novedades</h1>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-6"></div>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Mantente informado con nuestros análisis y noticias legales más recientes.
                </p>
            </div>

            @if(isset($novedades) && $novedades->isEmpty())
                <p class="text-center text-gray-600 py-8">No hay novedades publicadas en este momento.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($novedades as $novedad)
                        <a href="{{ route('novedades.show', $novedad->slug) }}" class="block bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 border border-gray-100">
                            {{-- Imagen destacada --}}
                            <div class="w-full h-52 overflow-hidden">
                                @if($novedad->imagen_destacada)
                                    <img src="{{ asset('storage/' . $novedad->imagen_destacada) }}" alt="{{ $novedad->titulo }}" 
                                         class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                                @else
                                    <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                                        <span class="text-gray-400">Imagen ilustrativa</span>
                                    </div>
                                @endif
                            </div>
                            
                            {{-- Contenido --}}
                            <div class="p-6">
                                <div class="flex items-center text-sm text-gray-500 mb-3">
                                    <span>{{ $novedad->fecha_publicacion->format('d M Y') }}</span>
                                    @if($novedad->autor)
                                        <span class="mx-2">•</span>
                                        <span>{{ $novedad->autor }}</span>
                                    @endif
                                </div>
                                
                                <h3 class="text-xl font-semibold text-gray-800 mb-3">{{ $novedad->titulo }}</h3>
                                
                                <p class="text-gray-600 mb-4 line-clamp-3">
                                    {{ Str::limit(strip_tags($novedad->contenido_corta ?: $novedad->contenido_completa), 150) }}
                                </p>
                                
                                <span class="text-blue-600 font-medium inline-flex items-center">
                                    Leer más
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