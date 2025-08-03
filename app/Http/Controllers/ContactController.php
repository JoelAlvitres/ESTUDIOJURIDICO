<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // Necesario para enviar correos
use App\Mail\ContactFormMail; // Importa la clase Mailable que creaste
use Illuminate\Support\Facades\Log; // Para depuración

class ContactController extends Controller
{
    /**
     * Muestra la página del formulario de contacto.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('web.contacto');
    }

    /**
     * Procesa el envío del formulario de contacto.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendEmail(Request $request)
    {
        Log::info('Datos recibidos del formulario de contacto:', $request->all());

        // 1. Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'asunto' => 'required|string|max:255',
            'mensaje' => 'required|string|min:10',
        ]);

        try {
            // 2. Enviar el correo electrónico
            // ¡CAMBIA ESTO POR EL EMAIL REAL DEL ESTUDIO AL QUE QUIERES RECIBIR LOS MENSAJES!
            $recipientEmail = 'tu_email_destino@example.com';

            Mail::to($recipientEmail)->send(new ContactFormMail($validatedData));

            Log::info('Correo de contacto enviado exitosamente a ' . $recipientEmail);

            // 3. Redirigir con un mensaje de éxito
            return redirect()->route('contact')->with('success', '¡Tu mensaje ha sido enviado con éxito! Nos pondremos en contacto contigo pronto.');

        } catch (\Exception $e) {
            // 4. Manejar errores y redirigir con un mensaje de error
            Log::error('Error al enviar el correo de contacto: ' . $e->getMessage());
            return redirect()->route('contact')->with('error', 'Hubo un problema al enviar tu mensaje. Por favor, inténtalo de nuevo más tarde.')->withInput();
        }
    }
}
