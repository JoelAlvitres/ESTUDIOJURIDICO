<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'Rodas Elías Abogados')</title>

    <!-- Enlace al favicon -->
    <link rel="icon" type="image/jpeg" href="{{ asset('imagenes/base.png') }}">
    {{-- Usando el CDN de Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Fuentes de Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    {{-- Firebase --}}
    <script type="module">
        import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-app.js";
        import { getAuth, signInWithCustomToken, signInAnonymously } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-auth.js";
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

    {{-- Estilos personalizados --}}
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
        
        /* Botones flotantes */
        .floating-buttons-container {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .floating-button {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            cursor: pointer;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: transform 0.2s ease-in-out;
        }
        
        .floating-button:hover {
            transform: scale(1.1);
        }

        .whatsapp-button {
            background-color: #25d366;
        }

        .chatbot-toggle-button {
            background-color: var(--dark-blue);
        }

        /* Ventana del chatbot */
        .chatbot-window {
            position: fixed;
            bottom: 2rem; 
            right: 9rem;
            width: 350px;
            height: 500px;
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease-in-out;
            transform: scale(0.9);
            opacity: 0;
            visibility: hidden;
            transform-origin: bottom right;
            z-index: 999;
        }
        
        @media (max-width: 640px) {
            .chatbot-window {
                right: 2rem;
                bottom: 9rem;
                width: 90%;
                max-width: 350px;
            }
        }
        
        .chatbot-window.visible {
            visibility: visible;
            opacity: 1;
            transform: scale(1);
        }

        .chatbot-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            background-color: var(--dark-blue);
            color: var(--white-text);
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
        }

        .chatbot-header h3 {
            font-weight: bold;
            font-family: 'Playfair Display', serif;
            margin: 0;
        }

        .chatbot-close-button {
            background: none;
            border: none;
            color: var(--white-text);
            cursor: pointer;
        }

        .chatbot-iframe {
            width: 100%;
            height: 100%;
            border: 0;
            border-bottom-left-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-[var(--light-grey)] text-[var(--charcoal-text)]">

    {{-- Splash screen --}}
    @if (request()->routeIs('home'))
        <div id="splash" class="fixed inset-0 flex flex-col justify-center items-center z-50 transition-opacity duration-1000 bg-[var(--dark-blue)]">
            <div class="absolute inset-0 bg-black opacity-70 z-10"></div>
            <img src="{{ asset('imagenes/base.png') }}" alt="Balanza de la Justicia" class="relative z-20 mb-6 w-40 h-40 object-contain" style="filter: drop-shadow(0 0 15px rgba(184, 134, 11, 0.7));">
            <h1 class="relative z-20 text-6xl font-bold mb-4 text-[var(--accent-gold)] tracking-wide">Rodas Elias Abogados Asociados</h1>
            <p class="relative z-20 text-2xl text-[var(--white-text)] opacity-90">Asesoria Legal Especializada para tu Negocio</p>
        </div>
    @endif

    {{-- Contenido Principal --}}
    <div id="main-content" class="@if(request()->routeIs('home')) opacity-0 @endif transition-opacity duration-1000">
        @include('partials.navbar')
        <div class="pt-24"></div>
        @yield('content')
        @include('partials.footer')
    </div>

    {{-- Botones flotantes --}}
    <div id="floating-buttons-container" class="floating-buttons-container @if(request()->routeIs('home')) opacity-0 @endif transition-opacity duration-1000">
        <!-- Botón de WhatsApp -->
        <a href="https://wa.me/51963976429" class="floating-button whatsapp-button" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-whatsapp"></i>
        </a>
        
        <!-- Botón del chatbot -->
        <button id="chatbot-toggle-button" class="floating-button chatbot-toggle-button">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm-1-8C9.89 9 9.38 9.5 9 10c0 1.39 1.11 2.5 2.5 2.5s2.5-1.11 2.5-2.5c0-1.38-1.11-2.5-2.5-2.5zm4.84 6.78c-.28.46-.77.72-1.32.72-.55 0-1.04-.26-1.32-.72-.28-.46-.38-1.01-.27-1.57.11-.56.45-1.03.95-1.32.5-.29 1.05-.36 1.57-.27.56.11 1.03.45 1.32.95.29.5.36 1.05.27 1.57-.11.56-.45 1.03-.95 1.32z"/>
            </svg>
        </button>
    
        <!-- Ventana del chatbot -->
        <div id="chatbot-window" class="chatbot-window">
            <div class="chatbot-header">
                <h3>Asistente Virtual</h3>
                <button id="chatbot-close-button" class="chatbot-close-button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <iframe src="{{ asset('ChatBot/index.html') }}" class="chatbot-iframe" title="Asistente Legal de Rodas Elías"></iframe>
        </div>
    </div>

    <script>
        // Lógica para el splash screen
        window.addEventListener('load', () => {
            @if (request()->routeIs('home'))
                const splashScreen = document.getElementById('splash');
                const mainContent = document.getElementById('main-content');
                const floatingButtonsContainer = document.getElementById('floating-buttons-container');

                setTimeout(() => {
                    splashScreen.classList.add('opacity-0');
                    setTimeout(() => {
                        splashScreen.style.display = 'none';
                        mainContent.classList.remove('opacity-0');
                        mainContent.classList.add('opacity-100');
                        floatingButtonsContainer.classList.remove('opacity-0');
                    }, 1000);
                }, 3000);
            @else
                const mainContent = document.getElementById('main-content');
                if (mainContent) {
                    mainContent.classList.remove('opacity-0');
                    mainContent.classList.add('opacity-100');
                }
            @endif

            // Actualizar año en el footer
            const currentYearElement = document.getElementById('current-year');
            if (currentYearElement) {
                currentYearElement.textContent = new Date().getFullYear();
            }
        });

        // Lógica del chatbot - ACTUALIZADO CON LA COMUNICACIÓN CON IFRAME
        document.addEventListener('DOMContentLoaded', () => {
            const toggleButton = document.getElementById('chatbot-toggle-button');
            const closeButton = document.getElementById('chatbot-close-button');
            const chatbotWindow = document.getElementById('chatbot-window');
            const chatbotIframe = chatbotWindow.querySelector('iframe');

            // Manejar mensajes del iframe del chatbot
            window.addEventListener('message', (event) => {
                if (event.data === 'closeChatbot') {
                    chatbotWindow.classList.remove('visible');
                }
                
                if (event.data.type === 'chatbotHeight') {
                    // Ajustar altura del iframe pero con un máximo de 500px
                    const newHeight = Math.min(event.data.height, 500);
                    chatbotIframe.style.height = `${newHeight}px`;
                    
                    // Ajustar también la altura de la ventana del chatbot
                    chatbotWindow.style.height = `${newHeight + 48}px`; // 48px es el alto del header
                }
            });

            toggleButton.addEventListener('click', () => {
                chatbotWindow.classList.toggle('visible');
                
                // Enviar mensaje al iframe cuando se abre
                if (chatbotWindow.classList.contains('visible')) {
                    chatbotIframe.contentWindow.postMessage('chatbotOpened', '*');
                }
            });

            closeButton.addEventListener('click', () => {
                chatbotWindow.classList.remove('visible');
            });
        });
    </script>
    @stack('scripts')
</body>
</html>