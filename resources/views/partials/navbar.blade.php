{{-- Barra de Navegación con Fondo Blanco --}}
<nav class="bg-white p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="/" class="flex items-center">
            <img src="{{ asset('imagenes/NAVBAR.jpeg') }}" alt="Logo de la Firma" class="h-12 w-auto mr-4">
        </a>

        <!-- Enlaces de Navegación -->
        <ul class="flex space-x-8 text-lg font-medium">
            <li><a href="{{ route('home') }}" class="text-[var(--dark-blue)] hover:text-[var(--accent-gold)] transition duration-300">Inicio</a></li>
            <li><a href="{{ route('nosotros') }}" class="text-[var(--dark-blue)] hover:text-[var(--accent-gold)] transition duration-300">Nosotros</a></li>
            <li><a href="{{ route('areas.index') }}" class="text-[var(--dark-blue)] hover:text-[var(--accent-gold)] transition duration-300">Áreas</a></li>
            <li><a href="{{ route('sedes') }}" class="text-[var(--dark-blue)] hover:text-[var(--accent-gold)] transition duration-300">Sedes</a></li>
            <li><a href="{{ route('novedades.index') }}" class="text-[var(--dark-blue)] hover:text-[var(--accent-gold)] transition duration-300">Novedades</a></li>
            <li><a href="{{ route('contact') }}" class="text-[var(--dark-blue)] hover:text-[var(--accent-gold)] transition duration-300">Contacto</a></li>
        </ul>
    </div>
</nav>
