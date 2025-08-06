{{-- resources/views/web/area-detalle.blade.php --}}

@extends('layouts.app')

@section('title', $area->nombre . ' - Áreas de Práctica - Estudio Rodas Elías')

@section('content')
    <section class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-6">
            {{-- ENLACE CORREGIDO: Se cambió 'areas' por 'areas.index' --}}
            <a href="{{ route('areas.index') }}" class="text-[var(--accent-gold)] hover:underline mb-8 inline-block">← Volver a Áreas</a>

            <article class="bg-white rounded-lg shadow-lg p-8">
                @if($area->imagen_destacada)
                    <img src="{{ asset('storage/' . $area->imagen_destacada) }}" alt="{{ $area->nombre }}" class="w-full h-auto object-contain rounded-lg mb-8">
                @else
                    <img src="https://placehold.co/800xauto/E0E0E0/333333?text=Área+de+Práctica" alt="Sin Imagen" class="w-full h-auto object-contain rounded-lg mb-8">
                @endif

                <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $area->nombre }}</h1>

                {{--
                    CAMBIO APLICADO AQUÍ: 
                    Se cambió '$area->descripcion_completa' a '$area->contenido' para que coincida con el campo de la base de datos que se usa en el formulario de la primera imagen.
                --}}
                <div class="prose max-w-none text-gray-700 leading-relaxed">
                    {!! $area->contenido !!}
                </div>
            </article>
        </div>
    </section>
@endsection
