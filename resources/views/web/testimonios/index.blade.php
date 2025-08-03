{{-- resources/views/web/testimonios.blade.php --}}

@extends('layouts.app')

@section('title', 'Testimonios - Rodas Elías Abogados')

@section('content')
    <div class="bg-[var(--light-grey)] py-20 px-6">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-5xl font-extrabold text-center mb-4 text-[var(--accent-gold)]">
                Lo Que Dicen Nuestros Clientes
            </h1>
            <p class="text-xl text-center mb-16 text-[var(--charcoal-text)] leading-relaxed">
                Historias de éxito y opiniones de quienes confían en nuestra asesoría legal.
            </p>

            @if(isset($testimonios) && $testimonios->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    @foreach($testimonios as $testimonio)
                        <div class="bg-[var(--white-text)] p-8 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 h-full flex flex-col justify-between">
                            <div>
                                <div class="text-center mb-4">
                                    {{-- Ícono de comillas para destacar --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-[var(--secondary-blue)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.5-4.5L14.5 9m-1.5 4.5l-4-4m-1.5-4.5h5.5l-2.5 2.5-3 3-2.5-2.5z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 13.5v-10h-10v10l2 2 2-2zM15 13.5v-4h-4v4l1.5 1.5 1.5-1.5z" />
                                    </svg>
                                </div>
                                <p class="text-xl italic font-serif mb-6 text-[var(--charcoal-text)] leading-relaxed">
                                    "{{ $testimonio->testimonio }}"
                                </p>
                            </div>
                            <div class="mt-4 pt-4 border-t border-gray-200">
                                <p class="font-bold text-xl text-[var(--secondary-blue)]">{{ $testimonio->nombre_cliente }}</p>
                                <p class="text-sm text-gray-500 mt-1">{{ $testimonio->cargo }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-600 text-lg">No se encontraron testimonios. Vuelve pronto para ver más.</p>
            @endif
        </div>
    </div>
@endsection
