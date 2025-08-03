{{-- resources/views/web/nosotros.blade.php --}}

{{-- Asegúrate de que extiende el layout correcto. NO 'web.layouts.app' --}}
@extends('layouts.app')

@section('title', 'Nosotros - Rodas Elías Abogados')

@section('content')
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold text-gray-800 mb-8">Nuestro Equipo</h2>
            <p class="text-lg text-gray-600 mb-12">Conoce a los profesionales que forman parte de nuestro equipo.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Bucle para mostrar cada profesional --}}
                @forelse($profesionales as $profesional)
                    {{-- Asegúrate de que no haya errores de sintaxis o variables incorrectas aquí --}}
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden p-6 transition-transform transform hover:scale-105">
                        <img src="{{ $profesional->foto ? asset('storage/' . $profesional->foto) : 'https://via.placeholder.com/400x300/E0E0E0/333333?text=Foto' }}"
                             alt="{{ $profesional->nombre_completo }}"
                             class="w-32 h-32 rounded-full mx-auto object-cover object-center mb-4">
                        <h3 class="text-2xl font-semibold text-blue-700 mb-1">{{ $profesional->nombre_completo }}</h3>
                        <p class="text-yellow-600 mb-2">{{ $profesional->cargo }}</p>
                        @if($profesional->especialidad)
                            <p class="text-gray-700 text-sm mb-3">Especialidad: {{ $profesional->especialidad }}</p>
                        @endif
                        <div class="text-gray-600 text-sm mb-4">
                            {!! Str::limit(strip_tags($profesional->biografia_corta ?: $profesional->biografia_completa), 100) !!}
                        </div>
                        <div class="mt-4 flex justify-center space-x-3">
                            @if($profesional->enlace_linkedin)
                                <a href="{{ $profesional->enlace_linkedin }}" target="_blank" rel="noopener noreferrer" class="text-blue-700 hover:text-blue-900 transition-colors">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.761s.784-1.761 1.75-1.761 1.75.79 1.75 1.761-.783 1.761-1.75 1.761zm13.5 12.268h-3v-5.604c0-3.368-4-3.529-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd"/></svg>
                                </a>
                            @endif
                            @if($profesional->email)
                                <a href="mailto:{{ $profesional->email }}" class="text-gray-700 hover:text-gray-900 transition-colors">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 12.713l-11.75 6.287h23.5l-11.75-6.287zm0-6.713l-12 7.042v-10.042l12-7.042 12 7.042v10.042l-12-7.042z"/></svg>
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500 col-span-full">No hay profesionales publicados en este momento.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection