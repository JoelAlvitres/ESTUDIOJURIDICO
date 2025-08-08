{{-- resources/views/web/area-detalle.blade.php --}}
@extends('layouts.app')

@section('title', $area->nombre . ' - Áreas de Práctica - Estudio Rodas Elías')

@section('content')
    <section class="py-16 bg-gradient-to-b from-gray-50 to-gray-100">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <a href="{{ route('areas.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Volver a Áreas de Práctica
                </a>
            </div>

            <article class="bg-white rounded-xl shadow-lg overflow-hidden">
                @if($area->imagen_destacada)
                    <div class="h-64 md:h-80 w-full overflow-hidden">
                        <img src="{{ asset('storage/' . $area->imagen_destacada) }}" alt="{{ $area->nombre }}" 
                             class="w-full h-full object-cover">
                    </div>
                @else
                    <div class="h-64 md:h-80 w-full bg-gradient-to-r from-blue-50 to-gray-100 flex items-center justify-center">
                        <span class="text-2xl font-medium text-gray-400">Imagen representativa de {{ $area->nombre }}</span>
                    </div>
                @endif

                <div class="p-8 md:p-10">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center mr-6">
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
                                $faClass = $iconMap[$area->icono] ?? 'fas fa-gavel';
                            @endphp
                            <i class="{{ $faClass }} text-2xl"></i>
                        </div>
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 font-serif">{{ $area->nombre }}</h1>
                    </div>

                    <div class="prose max-w-none text-gray-700 leading-relaxed text-justify">
                        {!! $area->contenido !!}
                    </div>

                    <div class="mt-12 pt-8 border-t border-gray-200">
                        <a href="{{ route('contact') }}" class="inline-block px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200">
                            Consultar sobre este servicio
                        </a>
                    </div>
                </div>
            </article>
        </div>
    </section>
@endsection