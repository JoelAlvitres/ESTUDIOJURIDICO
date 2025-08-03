{{-- resources/views/web/contacto.blade.php --}}

@extends('layouts.app') {{-- Asegúrate de que esto sea correcto --}}

@section('title', 'Contacto - Rodas Elías Abogados')

@section('content')
    <section class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-6">
            <h1 class="text-4xl font-bold text-gray-800 text-center mb-8">Contáctanos</h1>
            <p class="text-lg text-gray-600 text-center mb-12">Envíanos un mensaje y te responderemos a la brevedad posible.</p>

            {{-- Mensajes de éxito o error --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                    <strong class="font-bold">¡Éxito!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                    <strong class="font-bold">¡Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <form action="{{ route('contact.send') }}" method="POST" class="bg-white p-8 rounded-lg shadow-lg">
                @csrf {{-- ¡Importante! Token CSRF para seguridad en formularios --}}

                <div class="mb-6">
                    <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre Completo:</label>
                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}"
                           class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nombre') border-red-500 @enderror" required>
                    @error('nombre')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                           class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" required>
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="asunto" class="block text-gray-700 text-sm font-bold mb-2">Asunto:</label>
                    <input type="text" id="asunto" name="asunto" value="{{ old('asunto') }}"
                           class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('asunto') border-red-500 @enderror" required>
                    @error('asunto')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="mensaje" class="block text-gray-700 text-sm font-bold mb-2">Tu Mensaje:</label>
                    <textarea id="mensaje" name="mensaje" rows="6"
                              class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('mensaje') border-red-500 @enderror" required>{{ old('mensaje') }}</textarea>
                    @error('mensaje')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-center">
                    <button type="submit"
                            class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 px-6 rounded-lg focus:outline-none focus:shadow-outline transition-colors duration-300">
                        Enviar Mensaje
                    </button>
                </div>
            </form>

            {{-- Puedes añadir más información de contacto aquí (dirección, teléfono, mapa) --}}
            <div class="mt-12 text-center text-gray-700">
                <p class="text-xl font-semibold mb-4">Información de Contacto Adicional</p>
                <p class="mb-2"><strong class="text-blue-700">Dirección:</strong> Tu Dirección del Estudio</p>
                <p class="mb-2"><strong class="text-blue-700">Teléfono:</strong> +123 456 7890</p>
                <p><strong class="text-blue-700">Email:</strong> info@estudio.com</p>
            </div>

        </div>
    </section>
@endsection