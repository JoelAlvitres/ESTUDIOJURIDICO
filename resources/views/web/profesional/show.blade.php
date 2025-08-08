@extends('layouts.app')

@section('title', $profesional->nombre_completo . ' | ' . config('app.name'))
@section('meta_description', Str::limit(strip_tags($profesional->biografia_corta), 160))

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Migas de pan -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li>
                    <a href="{{ url('/') }}" class="text-gray-700 hover:text-primary text-sm">
                        Inicio
                    </a>
                </li>
                <li>
                    <svg class="w-4 h-4 mx-1 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                    <a href="{{ route('nosotros') }}" class="text-gray-700 hover:text-primary text-sm">
                        Equipo
                    </a>
                </li>
                <li aria-current="page">
                    <svg class="w-4 h-4 mx-1 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-gray-500 text-sm">
                        {{ $profesional->nombre_completo }}
                    </span>
                </li>
            </ol>
        </nav>

        <!-- Tarjeta del profesional -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            <div class="md:flex">
                <!-- Columna izquierda - Foto y contacto -->
                <div class="md:w-1/3 bg-gray-100 p-8 text-center">
                    <div class="relative mx-auto w-48 h-48 mb-6">
                        @if($profesional->foto)
                            <img src="{{ $profesional->foto_url }}" 
                                 alt="{{ $profesional->nombre_completo }}"
                                 class="rounded-full object-cover w-full h-full border-4 border-white shadow-md"
                                 loading="lazy">
                        @else
                            <div class="rounded-full bg-gray-300 w-full h-full flex items-center justify-center text-4xl font-bold text-gray-600">
                                {{ Str::initials($profesional->nombre_completo) }}
                            </div>
                        @endif
                    </div>

                    <h1 class="text-2xl font-bold text-gray-900">{{ $profesional->nombre_completo }}</h1>
                    <p class="text-primary font-medium mt-2">{{ $profesional->cargo }}</p>

                    @if($profesional->especialidad)
                        <div class="mt-4 px-4 py-2 bg-primary/10 rounded-lg inline-block">
                            <span class="text-sm font-medium text-primary">
                                {{ $profesional->especialidad }}
                            </span>
                        </div>
                    @endif

                    <!-- Sección de contacto -->
                    <div class="mt-8 space-y-3">
                        @if($profesional->email)
                            <div class="flex items-center justify-center text-gray-600">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                </svg>
                                <a href="mailto:{{ $profesional->email }}" class="hover:text-primary">{{ $profesional->email }}</a>
                            </div>
                        @endif

                        @if($profesional->enlace_linkedin)
                            <div class="flex items-center justify-center text-gray-600">
                                <svg class="w-5 h-5 mr-2 text-[#0A66C2]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                </svg>
                                <a href="{{ $profesional->enlace_linkedin }}" target="_blank" rel="noopener" class="hover:text-primary">Perfil LinkedIn</a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Columna derecha - Biografía -->
                <div class="md:w-2/3 p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Biografía Profesional</h2>
                    
                    <div class="prose max-w-none">
                        @if($profesional->biografia_completa)
                            {!! $profesional->biografia_completa !!}
                        @else
                            <p class="text-gray-600">{{ $profesional->biografia_corta }}</p>
                        @endif
                    </div>

                    <!-- Botón de volver -->
                    <div class="mt-8">
                        <a href="{{ route('nosotros') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-200 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Volver al equipo
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection