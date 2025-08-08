{{-- resources/views/web/novedad-detalle.blade.php --}}
@extends('layouts.app')

@section('title', $novedad->titulo . ' - Novedad - Estudio Rodas Elías')

@section('content')
    <section class="py-12 bg-gradient-to-b from-gray-50 to-gray-100">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            {{-- Botón de volver --}}
            <div class="mb-8">
                <a href="{{ route('novedades.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Volver a Novedades
                </a>
            </div>

            <article class="bg-white rounded-lg shadow-md overflow-hidden">
                {{-- Imagen destacada --}}
                @if($novedad->imagen_destacada)
                    <div class="w-full h-64 overflow-hidden">
                        <img src="{{ asset('storage/' . $novedad->imagen_destacada) }}" alt="{{ $novedad->titulo }}" 
                             class="w-full h-full object-cover">
                    </div>
                @endif

                <div class="p-6 md:p-8">
                    {{-- Encabezado --}}
                    <div class="mb-6">
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">{{ $novedad->titulo }}</h1>
                        <div class="flex items-center text-sm text-gray-500">
                            <span>{{ $novedad->fecha_publicacion->format('d M Y') }}</span>
                            @if($novedad->autor)
                                <span class="mx-2">•</span>
                                <span>{{ $novedad->autor }}</span>
                            @endif
                        </div>
                    </div>

                    {{-- DEPURACIÓN: Ver contenido crudo --}}
                    {{--
                    <div class="bg-yellow-50 p-4 mb-6 rounded-lg">
                        <h3 class="font-bold mb-2">Contenido crudo (debug):</h3>
                        <pre class="text-xs overflow-auto">{{ print_r($novedad->getAttributes(), true) }}</pre>
                    </div>
                    --}}

                    {{-- Contenido de la novedad --}}
                    @if($novedad->contenido_completa)
                        <div class="prose max-w-none text-gray-700 mb-6">
                            {!! $novedad->contenido_completa !!}
                        </div>
                    @elseif($novedad->contenido)
                        <div class="prose max-w-none text-gray-700 mb-6">
                            {!! $novedad->contenido !!}
                        </div>
                    @else
                        <div class="bg-red-50 text-red-700 p-4 rounded-lg">
                            No se encontró contenido para mostrar.
                        </div>
                    @endif
                </div>
            </article>
        </div>
    </section>
@endsection