{{-- resources/views/web/home.blade.php --}}

@extends('layouts.app')

@section('title', 'Rodas Elías Abogados - Asesoría Legal Empresarial')

@section('content')
    <!-- Sección de Héroe/Banner -->
    <section class="relative bg-[var(--light-grey)] py-32 px-4 text-center overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://via.placeholder.com/1920x800/E0E0E0/333333?text=Edificio+Moderno'); opacity: 0.2; transform: scaleX(-1);"></div>
        <div class="relative z-10 max-w-4xl mx-auto">
            <h1 class="text-6xl font-extrabold mb-8 text-[var(--accent-gold)] leading-tight">
                Firma Líder en Asesoría Legal Empresarial
            </h1>
            <p class="text-2xl mb-12 text-[var(--charcoal-text)] leading-relaxed opacity-90">
                Brindamos soluciones legales innovadoras con un compromiso inquebrantable hacia la excelencia y el éxito de nuestros clientes.
            </p>
            <a href="{{ route('nosotros') }}" class="inline-block bg-[var(--secondary-blue)] text-[var(--white-text)] py-4 px-12 rounded-full text-xl font-semibold hover:bg-[var(--accent-gold)] transition duration-300 transform hover:scale-105 shadow-lg">
                Descubre Quiénes Somos
            </a>
        </div>
    </section>

    {{-- SECCIÓN DE ÁREAS DE PRÁCTICA DINÁMICA --}}
    <section id="areas-preview" class="py-20 bg-[var(--white-text)]">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-5xl font-bold mb-16 text-[var(--accent-gold)]">Nuestras Áreas de Práctica</h2>
            @if(isset($ultimasAreas) && $ultimasAreas->isEmpty())
                <p class="text-center text-gray-600">No hay áreas de práctica recientes para mostrar.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-[var(--charcoal-text)]">
                    {{-- Bucle para mostrar las áreas de práctica --}}
                    @foreach($ultimasAreas as $area)
                        {{-- Se envuelve todo el bloque en el enlace para que sea clicable --}}
                        <a href="{{ route('areas.show', $area->slug) }}" class="group block bg-[var(--light-grey)] p-6 rounded-xl shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-2 h-full flex flex-col justify-between">
                            <div class="p-2 text-center">
                                {{-- Lógica condicional para mostrar el ícono correcto --}}
                                @if(Str::contains($area->nombre, 'Constitucional'))
                                    <svg class="h-16 w-16 mx-auto text-[var(--secondary-blue)] mb-4 transition-colors duration-300 group-hover:text-[var(--accent-gold)]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19L3 16v-8l6 3m-6 3v5l6 3v-5m-6-3l6-3m0 0l6-3m-6 3v5l6 3v-5"></path>
                                    </svg>
                                @elseif(Str::contains($area->nombre, 'Civil'))
                                    <svg class="h-16 w-16 mx-auto text-[var(--secondary-blue)] mb-4 transition-colors duration-300 group-hover:text-[var(--accent-gold)]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m-5 4h4a2 2 0 002-2v-8a2 2 0 00-2-2H9a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 10h-2M7 10H5a2 2 0 00-2 2v8a2 2 0 002 2h4a2 2 0 002-2v-8a2 2 0 00-2-2h-2z"></path>
                                    </svg>
                                @elseif(Str::contains($area->nombre, 'Familia'))
                                    <svg class="h-16 w-16 mx-auto text-[var(--secondary-blue)] mb-4 transition-colors duration-300 group-hover:text-[var(--accent-gold)]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                @else
                                    {{-- Ícono por defecto si no coincide --}}
                                    <svg class="h-16 w-16 mx-auto text-gray-400 mb-4 transition-colors duration-300 group-hover:text-[var(--secondary-blue)]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.748 5.617 9.458 5 8.167 5c-1.688 0-3.266.368-4.821 1.077a1.986 1.986 0 00-1.074 1.63M12 6.253a8.962 8.962 0 014.821 1.077c.65.342 1.074.966 1.074 1.63v4.442M12 6.253C13.252 5.617 14.542 5 15.833 5c1.688 0 3.266.368 4.821 1.077a1.986 1.986 0 011.074 1.63"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.5 10a5 5 0 11-10 0 5 5 0 0110 0z"></path>
                                    </svg>
                                @endif
                            </div>
                            <h3 class="text-xl font-semibold mb-2 text-[var(--secondary-blue)]">{{ $area->nombre }}</h3>
                            <p class="text-sm leading-relaxed mb-4">{{ $area->descripcion_corta }}</p>
                            {{-- Agregado el botón "Ver más" --}}
                            <div class="mt-auto">
                                <span class="inline-block text-[var(--accent-gold)] font-semibold transition duration-300 group-hover:text-[var(--secondary-blue)]">
                                    Ver más →
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
            {{-- Botón "Ver Todas las Áreas" - Centrado y con margen superior --}}
            <div class="mt-12 text-center">
                <a href="{{ route('areas.index') }}" class="inline-block bg-[var(--accent-gold)] text-[var(--white-text)] py-3 px-8 rounded-full text-lg font-semibold hover:bg-[var(--secondary-blue)] transition duration-300">Ver Todas las Áreas</a>
            </div>
        </div>
    </section>

    {{-- Esta sección de Sedes es estática, aún no la hemos dinamizado --}}
    <section id="sedes-preview" class="py-20 bg-[var(--light-grey)]">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-5xl font-bold mb-16 text-[var(--accent-gold)]">Nuestras Sedes</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="bg-[var(--white-text)] shadow-lg p-8 rounded-xl hover:shadow-2xl transition duration-300 transform hover:-translate-y-2">
                    <h3 class="text-3xl font-semibold mb-4 text-[var(--secondary-blue)]">Lima</h3>
                    <p class="text-lg leading-relaxed">Nuestra oficina principal, ubicada en el centro financiero y legal del país.</p>
                    <a href="{{ route('sedes') }}#lima" class="mt-4 inline-block text-[var(--accent-gold)] hover:text-[var(--secondary-blue)] font-semibold transition duration-300">Detalles →</a>
                </div>
                <div class="bg-[var(--white-text)] shadow-lg p-8 rounded-xl hover:shadow-2xl transition duration-300 transform hover:-translate-y-2">
                    <h3 class="text-3xl font-semibold mb-4 text-[var(--secondary-blue)]">Chimbote</h3>
                    <p class="text-lg leading-relaxed">Atención especializada para el sector pesquero e industrial de la región norte.</p>
                    <a href="{{ route('sedes') }}#chimbote" class="mt-4 inline-block text-[var(--accent-gold)] hover:text-[var(--secondary-blue)] font-semibold transition duration-300">Detalles →</a>
                </div>
                <div class="bg-[var(--white-text)] shadow-lg p-8 rounded-xl hover:shadow-2xl transition duration-300 transform hover:-translate-y-2">
                    <h3 class="text-3xl font-semibold mb-4 text-[var(--secondary-blue)]">Trujillo</h3>
                    <p class="text-lg leading-relaxed">Asesoría directa para empresas agroindustriales y negocios familiares en el norte chico.</p>
                    <a href="{{ route('sedes') }}#trujillo" class="mt-4 inline-block text-[var(--accent-gold)] hover:text-[var(--secondary-blue)] font-semibold transition duration-300">Detalles →</a>
                </div>
            </div>
            <div class="mt-12">
                <a href="{{ route('sedes') }}" class="inline-block bg-[var(--accent-gold)] text-[var(--white-text)] py-3 px-8 rounded-full text-lg font-semibold hover:bg-[var(--secondary-blue)] transition duration-300">Ver Todas las Sedes</a>
            </div>
        </div>
    </section>

    {{-- Esta sección de Reconocimientos es estática --}}
    <section id="reconocimientos" class="py-20 bg-[var(--dark-blue)] text-[var(--white-text)] text-center">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-5xl font-bold mb-16 text-[var(--accent-gold)]">Nuestros Reconocimientos</h2>
            <div class="flex flex-wrap justify-center items-center gap-12 mb-12">
                {{-- Se ha actualizado la ruta de las imágenes con los diplomas que subiste --}}
                <img src="{{ asset('imagenes/diploma2.jpg') }}" alt="Certificado 1" class="h-40 opacity-80 hover:opacity-100 transition duration-300">
                <img src="{{ asset('imagenes/diploma2.jpg') }}" alt="Certificado 2" class="h-40 opacity-80 hover:opacity-100 transition duration-300">
                <img src="{{ asset('imagenes/diploma2.jpg') }}" alt="Certificado 3" class="h-40 opacity-80 hover:opacity-100 transition duration-300">
                <img src="{{ asset('imagenes/diploma2.jpg') }}" alt="Certificado 4" class="h-40 opacity-80 hover:opacity-100 transition duration-300">
            </div>
        </div>
    </section>



    {{-- 
        ========================================================================
        Esta es la sección de testimonios estáticos para la página principal.
        Ahora el botón redirige a la sección de testimonios pública.
        ========================================================================
    --}}
    <section id="testimonios-preview" class="py-20 bg-[var(--white-text)]">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-5xl font-bold mb-8 text-[var(--accent-gold)]">Testimonios de Nuestros Clientes</h2>
            <p class="text-xl mb-12 text-[var(--charcoal-text)] leading-relaxed">Conoce las historias de éxito de quienes confían en nuestro servicio.</p>

            <!-- Contenedor de la cuadrícula de testimonios -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Testimonio 1 --}}
                <div class="bg-[var(--light-grey)] rounded-xl shadow-lg p-6 flex flex-col items-center text-center transition-all duration-300 transform hover:scale-105">
                    <blockquote class="italic text-lg text-[var(--charcoal-text)] opacity-90 mb-4">
                        "Increíble servicio. La atención al cliente fue excepcional y el producto superó todas mis expectativas."
                    </blockquote>
                    <div class="w-16 h-16 bg-blue-200 rounded-full flex items-center justify-center text-xl font-bold text-blue-800 mb-2">A.V.</div>
                    <p class="font-bold text-xl text-[var(--secondary-blue)]">Ana Valenzuela</p>
                    <p class="text-base text-[var(--charcoal-text)] opacity-70">Gerente de Proyectos</p>
                </div>

                {{-- Testimonio 2 --}}
                <div class="bg-[var(--light-grey)] rounded-xl shadow-lg p-6 flex flex-col items-center text-center transition-all duration-300 transform hover:scale-105">
                    <blockquote class="italic text-lg text-[var(--charcoal-text)] opacity-90 mb-4">
                        "Una experiencia transformadora. Recomiendo esta empresa a cualquiera que busque resultados de alta calidad."
                    </blockquote>
                    <div class="w-16 h-16 bg-green-200 rounded-full flex items-center justify-center text-xl font-bold text-green-800 mb-2">J.M.</div>
                    <p class="font-bold text-xl text-[var(--secondary-blue)]">Juan Méndez</p>
                    <p class="text-base text-[var(--charcoal-text)] opacity-70">Director de Marketing</p>
                </div>

                {{-- Testimonio 3 --}}
                <div class="bg-[var(--light-grey)] rounded-xl shadow-lg p-6 flex flex-col items-center text-center transition-all duration-300 transform hover:scale-105">
                    <blockquote class="italic text-lg text-[var(--charcoal-text)] opacity-90 mb-4">
                        "Me encantó su enfoque metódico y su dedicación para resolver mis problemas. Volveré a trabajar con ellos."
                    </blockquote>
                    <div class="w-16 h-16 bg-purple-200 rounded-full flex items-center justify-center text-xl font-bold text-purple-800 mb-2">L.R.</div>
                    <p class="font-bold text-xl text-[var(--secondary-blue)]">Laura Ramírez</p>
                    <p class="text-base text-[var(--charcoal-text)] opacity-70">Analista de Negocios</p>
                </div>
            </div>

            {{-- Botón para redirigir a la página completa de testimonios, ahora ubicado debajo --}}
            <div class="mt-12">
                <a href="{{ route('testimonios.index') }}" class="inline-block bg-[var(--secondary-blue)] text-[var(--white-text)] py-3 px-8 rounded-full text-lg font-semibold hover:bg-[var(--accent-gold)] transition duration-300">
                    Ver Todos los Testimonios
                </a>
            </div>
        </div>
    </section>

    {{-- SECCIÓN DE NOVEDADES DINÁMICA --}}
    <section id="novedades-preview" class="py-20 bg-[var(--light-grey)]">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-5xl font-bold mb-16 text-[var(--accent-gold)]">Últimas Novedades y Artículos</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @if(isset($novedades) && $novedades->isEmpty())
                    <p class="text-center text-gray-600 col-span-full">No hay novedades recientes para mostrar.</p>
                @else
                    @foreach($novedades as $novedad)
                        <div class="bg-[var(--white-text)] border border-gray-200 p-6 rounded-xl shadow-md hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                            @if($novedad->imagen_destacada)
                                <img src="{{ asset('storage/' . $novedad->imagen_destacada) }}" alt="{{ $novedad->titulo }}" class="mb-6 rounded-lg w-full h-48 object-cover">
                            @else
                                <img src="https://placehold.co/400x250?text=Sin+Imagen" alt="Sin Imagen" class="mb-6 rounded-lg w-full h-48 object-cover">
                            @endif
                            <h3 class="text-2xl font-semibold mb-3 text-[var(--secondary-blue)]">{{ $novedad->titulo }}</h3>
                            <p class="text-sm text-gray-500 mb-4">{{ \Carbon\Carbon::parse($novedad->fecha_publicacion)->format('d M Y') }}</p>
                            <p class="text-base leading-relaxed mb-4">{{ Str::limit(strip_tags($novedad->contenido), 120) }}</p>
                            <a href="{{ route('novedades.show', $novedad->slug) }}" class="text-[var(--accent-gold)] hover:text-[var(--secondary-blue)] font-semibold transition duration-300">Leer más →</a>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="mt-12">
                <a href="{{ route('novedades.index') }}" class="inline-block bg-[var(--accent-gold)] text-[var(--white-text)] py-3 px-8 rounded-full text-lg font-semibold hover:bg-[var(--secondary-blue)] transition duration-300">Ver Todas las Novedades</a>
            </div>
        </div>
    </section>

    <!-- Sección de Llamada a la Acción (CTA) -->
    <section class="py-16 bg-[var(--dark-blue)] text-[var(--white-text)] text-center">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-4xl font-bold mb-6">¿Necesitas Asesoría Legal?</h2>
            <p class="text-xl mb-8">Estamos listos para ayudarte. Contáctanos hoy mismo para una consulta.</p>
            <a href="{{ route('contact') }}" class="bg-[var(--accent-gold)] text-[var(--dark-blue)] px-10 py-4 rounded-full text-xl font-semibold hover:bg-[var(--yellow-600)] transition duration-300">Agenda tu Consulta</a>
        </div>
    </section>
@endsection
