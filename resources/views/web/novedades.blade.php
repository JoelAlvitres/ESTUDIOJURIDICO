{{-- resources/views/web/novedades.blade.php --}}

@extends('layouts.app')

@section('title', 'Novedades - Estudio Rodas Elías')

@section('content')
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <h1 class="text-4xl font-bold text-gray-800 text-center mb-8">Últimas Novedades y Artículos</h1>
            <p class="text-lg text-gray-600 text-center mb-12">Mantente informado con nuestros análisis y noticias legales más recientes.</p>

            @if(isset($novedades) && $novedades->isEmpty())
                <p class="text-center text-gray-600">No hay novedades publicadas en este momento.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($novedades as $novedad)
                        <a href="{{ route('novedades.show', $novedad->slug) }}" class="block bg-white rounded-lg shadow-lg overflow-hidden p-6 hover:shadow-xl transition-shadow duration-300">
                            {{-- Contenedor de imagen con altura fija y overflow hidden para consistencia --}}
                            <div class="w-full h-48 overflow-hidden mb-4 rounded">
                                @if($novedad->imagen_destacada)
                                    {{-- Usamos object-cover para llenar el espacio, aceptando un posible recorte --}}
                                    <img src="{{ asset('storage/' . $novedad->imagen_destacada) }}" alt="{{ $novedad->titulo }}" class="w-full h-full object-cover object-center">
                                @else
                                    {{-- Placeholder con el mismo comportamiento --}}
                                    <img src="https://placehold.co/400x250/E0E0E0/333333?text=Novedad" alt="Sin Imagen" class="w-full h-full object-cover object-center">
                                @endif
                            </div>
                            <h3 class="text-2xl font-semibold text-blue-700 mb-2">{{ $novedad->titulo }}</h3>
                            <p class="text-gray-600 text-sm mb-3">
                                Publicado el {{ $novedad->fecha_publicacion->format('d M Y') }}
                                @if($novedad->autor) {{-- Muestra el autor si existe --}}
                                    por {{ $novedad->autor }}
                                @endif
                            </p>
                            {{-- Muestra una versión más larga del contenido corto, o del contenido completo si el corto está vacío --}}
                            <p class="text-gray-700 text-base">{{ Str::limit(strip_tags($novedad->contenido_corta ?: $novedad->contenido_completa), 150) }}</p>
                        </a>
                    @endforeach
                </div>
            @endif

            {{-- Aquí podrías añadir enlaces de paginación si los necesitas --}}
            {{-- {{ $novedades->links() }} --}}
        </div>
    </section>
@endsection
