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
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 text-[var(--charcoal-text)]">
                    {{-- Bucle para mostrar las áreas de práctica --}}
                    @foreach($ultimasAreas as $area)
                        <a href="{{ route('areas.show', $area->slug) }}" class="block bg-[var(--light-grey)] p-8 rounded-xl shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-2">
                            <div class="p-2 text-center">
                                @if($area->icono)
                                    <x-heroicon-o-{{ Str::after($area->icono, 'heroicon-o-') }} class="h-16 w-16 mx-auto text-[var(--accent-gold)] mb-4" />
                                @else
                                    <x-heroicon-o-cube class="h-16 w-16 mx-auto text-gray-400 mb-4" />
                                @endif
                            </div>
                            <h3 class="text-3xl font-semibold mb-4 text-[var(--secondary-blue)]">{{ $area->nombre }}</h3>
                            <p class="text-lg leading-relaxed">{{ $area->descripcion_corta }}</p>
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
            <div class="flex flex-wrap justify-center items-center gap-12">
                <img src="https://via.placeholder.com/150x80/FFFFFF/000000?text=IFLR1000" alt="IFLR1000 Logo" class="h-20 opacity-80 hover:opacity-100 transition duration-300">
                <img src="https://via.placeholder.com/150x80/FFFFFF/000000?text=Chambers" alt="Chambers Logo" class="h-20 opacity-80 hover:opacity-100 transition duration-300">
                <img src="https://via.placeholder.com/150x80/FFFFFF/000000?text=Legal500" alt="Legal 500 Logo" class="h-20 opacity-80 hover:opacity-100 transition duration-300">
                <img src="https://via.placeholder.com/150x80/FFFFFF/000000?text=LatinLawyer" alt="Latin Lawyer Logo" class="h-20 opacity-80 hover:opacity-100 transition duration-300">
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
