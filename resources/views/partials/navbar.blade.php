<nav class="bg-[var(--dark-blue)] text-[var(--white-text)] py-4 px-6 shadow-lg fixed w-full z-40 top-0">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <div class="text-3xl font-bold tracking-wider" style="color: var(--accent-gold);">
            Rodas Elías
        </div>
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
