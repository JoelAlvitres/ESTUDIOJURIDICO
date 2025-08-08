@extends('layouts.app')

@section('title', 'Nuestro Equipo - ' . config('app.name'))

@section('content')
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Encabezado -->
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Nuestro Equipo Profesional</h1>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Conoce a los expertos que forman parte de nuestro estudio jurídico
            </p>
        </div>

        <!-- Grid de profesionales -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($profesionales as $profesional)
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                <!-- Contenedor de foto ajustado para mostrar más parte superior -->
                <div class="w-full h-64 relative overflow-hidden">
                    @if($profesional->foto)
                        <img src="{{ asset('storage/' . $profesional->foto) }}" 
                             alt="Foto de {{ $profesional->nombre_completo }}"
                             class="absolute w-full h-full object-cover"
                             style="object-position: center 30%;"
                             loading="lazy">
                    @else
                        <div class="absolute w-full h-full bg-gradient-to-br from-blue-50 to-gray-100 flex items-center justify-center">
                            <span class="text-4xl font-bold text-gray-500">
                                {{ Str::initials($profesional->nombre_completo) }}
                            </span>
                        </div>
                    @endif
                </div>

                <!-- Información del profesional (manteniendo el estilo anterior) -->
                <div class="p-6">
                    <h2 class="text-xl font-bold text-gray-900">{{ $profesional->nombre_completo }}</h2>
                    <p class="text-blue-600 font-medium mt-1">{{ $profesional->cargo }}</p>
                    
                    @if($profesional->especialidad)
                        <p class="mt-3 text-sm text-gray-600">
                            <span class="font-semibold">Especialidad:</span> {{ $profesional->especialidad }}
                        </p>
                    @endif

                    <div class="mt-4">
                        <p class="text-gray-600 text-sm">
                            {{ strip_tags($profesional->biografia_corta) }}
                        </p>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('profesional.show', $profesional->slug) }}" 
                           class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium text-sm">
                            Ver perfil completo
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500">Actualmente no hay profesionales disponibles</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection