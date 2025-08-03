<nav class="bg-gray-800 p-4 text-white">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="/" class="flex items-center">
            {{-- Asegúrate de que tu imagen 'NAVBAR.jpeg' esté en la carpeta 'public' --}}
            <img src="{{ asset('imagenes/NAVBAR.jpeg') }}" alt="Logo de la Firma" class="h-12 w-auto rounded-full mr-4">
            <span class="text-xl font-bold"></span>
        </a>

        <!-- Enlaces de Navegación -->
         <ul class="flex space-x-8 text-lg font-medium">
            <li><a href="{{ route('home') }}" class="hover:text-[var(--accent-gold)] transition duration-300">Inicio</a></li>
            <li><a href="{{ route('nosotros') }}" class="hover:text-[var(--accent-gold)] transition duration-300">Nosotros</a></li>
            <li><a href="{{ route('areas.index') }}" class="hover:text-[var(--accent-gold)] transition duration-300">Áreas</a></li>
            <li><a href="{{ route('sedes') }}" class="hover:text-[var(--accent-gold)] transition duration-300">Sedes</a></li>
            <li><a href="{{ route('novedades.index') }}" class="hover:text-[var(--accent-gold)] transition duration-300">Novedades</a></li>
            <li><a href="{{ route('contact') }}" class="hover:text-[var(--accent-gold)] transition duration-300">Contacto</a></li>
            {{-- Aquí podrías añadir un enlace para el login de clientes --}}
            {{-- <li><a href="{{ route('login') }}" class="hover:text-[var(--accent-gold)] transition duration-300">Acceder Clientes</a></li> --}}
        </ul>
    </div>
</nav>
