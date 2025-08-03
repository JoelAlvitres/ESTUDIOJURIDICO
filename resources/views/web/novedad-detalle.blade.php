{{-- resources/views/web/novedad-detalle.blade.php --}}

@extends('layouts.app')

@section('title', $novedad->titulo . ' - Novedad - Estudio Rodas Elías')

@section('content')
    <section class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-6">
            {{-- Enlace para volver a la lista de novedades --}}
            <a href="{{ route('novedades.index') }}" class="text-[var(--accent-gold)] hover:underline mb-8 inline-block">← Volver a Novedades</a>

            <article class="bg-white rounded-lg shadow-lg p-8">
                @if($novedad->imagen_destacada)
                    {{-- Cambiado h-96 object-cover a w-full h-auto object-contain para que la imagen se ajuste completamente --}}
                    <img src="{{ asset('storage/' . $novedad->imagen_destacada) }}" alt="{{ $novedad->titulo }}" class="w-full h-auto object-contain rounded-lg mb-8">
                @else
                    {{-- También ajustado el placeholder --}}
                    <img src="https://placehold.co/800xauto/E0E0E0/333333?text=Novedad" alt="Sin Imagen" class="w-full h-auto object-contain rounded-lg mb-8">
                @endif

                <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $novedad->titulo }}</h1>
                <p class="text-gray-600 text-sm mb-6">Publicado el {{ $novedad->fecha_publicacion->format('d M Y') }}</p>

                <div class="prose max-w-none text-gray-700 leading-relaxed">
                    {!! $novedad->contenido_completa !!}
                </div>
            </article>
        </div>
    </section>
@endsection
