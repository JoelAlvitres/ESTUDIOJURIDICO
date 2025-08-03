@extends('layouts.app')

@section('title', 'Sedes - Rodas Elías Abogados')

@section('content')
    <section class="py-20 px-4 max-w-7xl mx-auto">
        <h1 class="text-5xl font-bold mb-16 text-[var(--accent-gold)] text-center">Nuestras Oficinas</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            {{-- Sede Lima --}}
            <div id="lima" class="bg-[var(--white-text)] p-8 rounded-xl shadow-lg border-t-4 border-[var(--secondary-blue)]">
                <h2 class="text-4xl font-semibold mb-6 text-[var(--secondary-blue)]">Oficina Principal - Lima</h2>
                <p class="text-lg leading-relaxed mb-4">
                    Nuestra sede central se encuentra estratégicamente ubicada en el corazón del distrito financiero de San Isidro, Lima. Desde aquí, coordinamos todas nuestras operaciones y brindamos atención personalizada a nuestros clientes nacionales e internacionales.
                </p>
                <p class="text-lg font-semibold text-[var(--charcoal-text)] mb-2">Dirección:</p>
                <p class="text-lg text-gray-700 mb-4">Av. Central 123, Edificio Legal Tower, Piso 15, San Isidro, Lima, Perú.</p>
                <p class="text-lg font-semibold text-[var(--charcoal-text)] mb-2">Teléfono:</p>
                <p class="text-lg text-gray-700 mb-4">+51 1 555-1234</p>
                <p class="text-lg font-semibold text-[var(--charcoal-text)] mb-2">Email:</p>
                <p class="text-lg text-gray-700 mb-6"><a href="mailto:lima@rodaselias.com" class="text-[var(--secondary-blue)] hover:underline">lima@rodaselias.com</a></p>
                <div class="h-64 bg-gray-200 rounded-lg overflow-hidden">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.353396605036!2d-77.03964958564032!3d-12.083838944510065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c868d4f4f4f3%3A0xcb1b2b1b2b1b2b1b!2sAv.%20Central%20123%2C%20San%20Isidro%2015046%2C%20Peru!5e0!3m2!1sen!2sus!4v1678901234567!5m2!1sen!2sus"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

            {{-- Sede Chimbote --}}
            <div id="chimbote" class="bg-[var(--white-text)] p-8 rounded-xl shadow-lg border-t-4 border-[var(--secondary-blue)]">
                <h2 class="text-4xl font-semibold mb-6 text-[var(--secondary-blue)]">Oficina Chimbote</h2>
                <p class="text-lg leading-relaxed mb-4">
                    Nuestra oficina en Chimbote nos permite atender de cerca las necesidades legales del sector pesquero, industrial y comercial de la región de Ancash. Estamos comprometidos con el desarrollo económico local.
                </p>
                <p class="text-lg font-semibold text-[var(--charcoal-text)] mb-2">Dirección:</p>
                <p class="text-lg text-gray-700 mb-4">Jr. José Olaya 789, Urb. Bellamar, Chimbote, Ancash, Perú.</p>
                <p class="text-lg font-semibold text-[var(--charcoal-text)] mb-2">Teléfono:</p>
                <p class="text-lg text-gray-700 mb-4">+51 44 333-222</p>
                <p class="text-lg font-semibold text-[var(--charcoal-text)] mb-2">Email:</p>
                <p class="text-lg text-gray-700 mb-6"><a href="mailto:chimbote@rodaselias.com" class="text-[var(--secondary-blue)] hover:underline">chimbote@rodaselias.com</a></p>
                <div class="h-64 bg-gray-200 rounded-lg overflow-hidden">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3900.567086889417!2d-78.5804595856358!3d-9.068863643794713!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91ad2173f30a9167%3A0xc1b2b1b2b1b2b1b2!2sJr.%20Jos%C3%A9%20Olaya%20789%2C%20Chimbote%2002701%2C%20Peru!5e0!3m2!1sen!2sus!4v1678901234567!5m2!1sen!2sus"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

            {{-- Sede Trujillo --}}
            <div id="trujillo" class="bg-[var(--white-text)] p-8 rounded-xl shadow-lg border-t-4 border-[var(--secondary-blue)]">
                <h2 class="text-4xl font-semibold mb-6 text-[var(--secondary-blue)]">Oficina Trujillo</h2>
                <p class="text-lg leading-relaxed mb-4">
                    Nuestra presencia en Trujillo nos permite ofrecer un servicio cercano a las empresas agroindustriales, comerciales y familiares de La Libertad. Somos su aliado estratégico en el norte del Perú.
                </p>
                <p class="text-lg font-semibold text-[var(--charcoal-text)] mb-2">Dirección:</p>
                <p class="text-lg text-gray-700 mb-4">Av. España 456, Urb. Centro Histórico, Trujillo, La Libertad, Perú.</p>
                <p class="text-lg font-semibold text-[var(--charcoal-text)] mb-2">Teléfono:</p>
                <p class="text-lg text-gray-700 mb-4">+51 44 777-888</p>
                <p class="text-lg font-semibold text-[var(--charcoal-text)] mb-2">Email:</p>
                <p class="text-lg text-gray-700 mb-6"><a href="mailto:trujillo@rodaselias.com" class="text-[var(--secondary-blue)] hover:underline">trujillo@rodaselias.com</a></p>
                <div class="h-64 bg-gray-200 rounded-lg overflow-hidden">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3899.9806653835016!2d-79.02898958563251!3d-8.110595942475058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91ad3d0a916789b7%3A0xc1b2b1b2b1b2b1b2!2sAv.%20Espa%C3%B1a%20456%2C%20Trujillo%2013001%2C%20Peru!5e0!3m2!1sen!2sus!4v1678901234567!5m2!1sen!2sus"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection