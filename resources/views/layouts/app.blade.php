<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'Rodas Elías Abogados')</title>

    {{-- Usando el CDN de Tailwind CSS (versión para desarrollo rápido) --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Fuentes de Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    
    {{-- Librería de iconos Font Awesome para el botón de WhatsApp y menú de hamburguesa --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    {{-- Firebase --}}
    <script type="module">
        import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-app.js";
        import { getAuth, signInWithCustomToken, signInAnonymously, onAuthStateChanged } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-auth.js";
        import { getFirestore } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-firestore.js";
        
        const firebaseConfig = JSON.parse(typeof __firebase_config !== 'undefined' ? __firebase_config : '{}');
        const app = initializeApp(firebaseConfig);
        const db = getFirestore(app);
        const auth = getAuth(app);
        
        const signIn = async () => {
          try {
            if (typeof __initial_auth_token !== 'undefined') {
              await signInWithCustomToken(auth, __initial_auth_token);
            } else {
              await signInAnonymously(auth);
            }
          } catch (error) {
            console.error("Error signing in:", error);
          }
        };

        signIn();
    </script>


    {{-- Estilos personalizados y variables CSS --}}
    <style>
        :root {
            --dark-blue: #1A2E35;
            --light-grey: #F0F2F5;
            --charcoal-text: #333333;
            --accent-gold: #B8860B;
            --secondary-blue: #2A607C;
            --white-text: #FFFFFF;
            --yellow-600: #D9B000;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            color: var(--charcoal-text);
        }

        h1, h2, h3, h4 {
            font-family: 'Playfair Display', serif;
        }

        /* Estilos para el botón flotante de WhatsApp */
        .whatsapp-flotante {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 60px;
            height: 60px;
            background-color: #25d366;
            color: white;
            border-radius: 50%;
            text-align: center;
            font-size: 28px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .whatsapp-flotante:hover {
            transform: scale(1.1);
        }
    </style>
    @stack('styles')
</head>
<body class="bg-[var(--light-grey)] text-[var(--charcoal-text)]">

    {{-- El splash screen solo se renderizará en la página de inicio --}}
    @if (request()->routeIs('home'))
        <div id="splash" class="fixed inset-0 flex flex-col justify-center items-center z-50 transition-opacity duration-1000 bg-[var(--dark-blue)]">
            <div class="absolute inset-0 bg-black opacity-70 z-10"></div> {{-- Superposición oscura --}}
            <img src="{{ asset('imagenes/base.png') }}" alt="Balanza de la Justicia" class="relative z-20 mb-6 w-40 h-40 object-contain" style="filter: drop-shadow(0 0 15px rgba(184, 134, 11, 0.7));">
            <h1 class="relative z-20 text-6xl font-bold mb-4 text-[var(--accent-gold)] tracking-wide">Rodas Elías Abogados</h1>
            <p class="relative z-20 text-2xl text-[var(--white-text)] opacity-90">Asesoría Legal Especializada para tu Negocio</p>
        </div>
    @endif

    {{-- Contenido Principal envuelto en el div de transición --}}
    <div id="main-content" class="@if(request()->routeIs('home')) opacity-0 @endif transition-opacity duration-1000">

        {{-- Navbar (Componente o parcial) --}}
        @include('partials.navbar')

        {{-- Este div añade un espacio para que el contenido no quede debajo del navbar fijo.
             Ajusta 'pt-24' según la altura real de tu navbar. --}}
        <div class="pt-24"></div>

        {{-- Contenido de la página se inyectará aquí --}}
        @yield('content')

        {{-- Footer (Componente o parcial) --}}
        @include('partials.footer')
    </div>

    {{-- Botón flotante de WhatsApp --}}
    <!-- Reemplaza '51999888777' con tu número de teléfono, incluyendo el código de país -->
    <a href="https://wa.me/51999888777" class="whatsapp-flotante" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script>
        window.addEventListener('load', () => {
            // Lógica para el splash screen
            @if (request()->routeIs('home'))
                const splashScreen = document.getElementById('splash');
                const mainContent = document.getElementById('main-content');

                setTimeout(() => {
                    splashScreen.classList.add('opacity-0');
                    setTimeout(() => {
                        splashScreen.style.display = 'none';
                        mainContent.classList.remove('opacity-0');
                        mainContent.classList.add('opacity-100');
                    }, 1000); // Duración de la transición del splash
                }, 3000); // Duración que el splash screen permanece visible
            @else
                // Si no es la página de inicio, mostrar el contenido principal inmediatamente
                const mainContent = document.getElementById('main-content');
                if (mainContent) {
                    mainContent.classList.remove('opacity-0');
                    mainContent.classList.add('opacity-100');
                }
            @endif

            // Actualizar año en el footer (asegúrate de que tu footer tenga un elemento con id="current-year")
            const currentYearElement = document.getElementById('current-year');
            if (currentYearElement) {
                currentYearElement.textContent = new Date().getFullYear();
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
