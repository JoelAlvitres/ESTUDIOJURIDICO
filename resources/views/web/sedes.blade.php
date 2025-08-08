@extends('layouts.app')

@section('title', 'Sedes - Rodas Elías Abogados')

@section('content')
    <section class="py-16 px-4 max-w-7xl mx-auto">
        <!-- Encabezado mejorado -->
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 text-[var(--secondary-blue)]">Nuestras Oficinas</h1>
            <div class="w-24 h-1 bg-[var(--accent-gold)] mx-auto mb-6"></div>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Con presencia estratégica en las principales ciudades del norte del Perú, brindamos atención personalizada y cercana.
            </p>
        </div>

        <!-- Grid de sedes mejorado -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Sede Chepén -->
            <div id="chepen" class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 border-l-4 border-[var(--secondary-blue)]">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 rounded-full bg-blue-50 text-[var(--secondary-blue)] flex items-center justify-center mr-4">
                        <i class="fas fa-building text-xl"></i>
                    </div>
                    <h2 class="text-2xl md:text-3xl font-semibold text-gray-800">Chepén</h2>
                </div>
                
                <p class="text-gray-600 leading-relaxed mb-6">
                    Nuestra oficina principal en el corazón de Chepén, desde donde coordinamos todas nuestras operaciones legales.
                </p>
                
                <div class="space-y-4 mb-6">
                    <div class="flex items-start">
                        <i class="fas fa-map-marker-alt text-[var(--accent-gold)] mt-1 mr-3"></i>
                        <p class="text-gray-700">Av. 28 de Julio, Chepén, La Libertad</p>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-phone-alt text-[var(--accent-gold)] mr-3"></i>
                        <p class="text-gray-700">+51 555-1234</p>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-envelope text-[var(--accent-gold)] mr-3"></i>
                        <a href="mailto:contacto@estudiorodas.com" class="text-[var(--secondary-blue)] hover:underline">contacto@estudiorodas.com</a>
                    </div>
                </div>
                
                <div class="h-48 bg-gray-100 rounded-lg overflow-hidden">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.256247738221!2d-79.43794352495674!3d-7.223966601445749!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x904d335b443e98e9%3A0x8386716ad6b2a134!2sEstudio%20Jur%C3%ADdico%20%22RODAS%20ELIAS%22%20%26%20ABOGADOS%20ASOCIADOS!5e0!3m2!1ses!2spe!4v1716301300000!5m2!1ses!2spe"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

            <!-- Sede Chimbote -->
            <div id="chimbote" class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 border-l-4 border-[var(--secondary-blue)]">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 rounded-full bg-blue-50 text-[var(--secondary-blue)] flex items-center justify-center mr-4">
                        <i class="fas fa-anchor text-xl"></i>
                    </div>
                    <h2 class="text-2xl md:text-3xl font-semibold text-gray-800">Chimbote</h2>
                </div>
                
                <p class="text-gray-600 leading-relaxed mb-6">
                    Especializada en el sector pesquero e industrial, atendemos las necesidades legales de la región Ancash.
                </p>
                
                <div class="space-y-4 mb-6">
                    <div class="flex items-start">
                        <i class="fas fa-map-marker-alt text-[var(--accent-gold)] mt-1 mr-3"></i>
                        <p class="text-gray-700">Jr. José Olaya 789, Urb. Bellamar, Chimbote</p>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-phone-alt text-[var(--accent-gold)] mr-3"></i>
                        <p class="text-gray-700">+51 44 333-222</p>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-envelope text-[var(--accent-gold)] mr-3"></i>
                        <a href="mailto:chimbote@rodaselias.com" class="text-[var(--secondary-blue)] hover:underline">chimbote@rodaselias.com</a>
                    </div>
                </div>
                
                <div class="h-48 bg-gray-100 rounded-lg overflow-hidden">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3900.567086889417!2d-78.5804595856358!3d-9.068863643794713!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91ad2173f30a9167%3A0xc1b2b1b2b1b2b1b2!2sJr.%20Jos%C3%A9%20Olaya%20789%2C%20Chimbote%2002701%2C%20Peru!5e0!3m2!1sen!2sus!4v1678901234567!5m2!1sen!2sus"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

            <!-- Sede Trujillo -->
            <div id="trujillo" class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 border-l-4 border-[var(--secondary-blue)]">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 rounded-full bg-blue-50 text-[var(--secondary-blue)] flex items-center justify-center mr-4">
                        <i class="fas fa-industry text-xl"></i>
                    </div>
                    <h2 class="text-2xl md:text-3xl font-semibold text-gray-800">Trujillo</h2>
                </div>
                
                <p class="text-gray-600 leading-relaxed mb-6">
                    Enfocada en el sector agroindustrial y comercial, somos el aliado legal preferido en La Libertad.
                </p>
                
                <div class="space-y-4 mb-6">
                    <div class="flex items-start">
                        <i class="fas fa-map-marker-alt text-[var(--accent-gold)] mt-1 mr-3"></i>
                        <p class="text-gray-700">Av. España 456, Centro Histórico, Trujillo</p>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-phone-alt text-[var(--accent-gold)] mr-3"></i>
                        <p class="text-gray-700">+51 44 777-888</p>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-envelope text-[var(--accent-gold)] mr-3"></i>
                        <a href="mailto:trujillo@rodaselias.com" class="text-[var(--secondary-blue)] hover:underline">trujillo@rodaselias.com</a>
                    </div>
                </div>
                
                <div class="h-48 bg-gray-100 rounded-lg overflow-hidden">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3899.9806653835016!2d-79.02898958563251!3d-8.110595942475058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91ad3d0a916789b7%3A0xc1b2b1b2b1b2b1b2!2sAv.%20Espa%C3%B1a%20456%2C%20Trujillo%2013001%2C%20Peru!5e0!3m2!1sen!2sus!4v1678901234567!5m2!1sen!2sus"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection