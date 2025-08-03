<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    // Propiedad pública para pasar los datos del formulario a la vista del email
    public $data;

    /**
     * Crea una nueva instancia del mensaje.
     *
     * @param array $data Los datos validados del formulario de contacto.
     */
    public function __construct(array $data)
    {
        $this->data = $data; // Asigna los datos del formulario a la propiedad
    }

    /**
     * Obtiene el sobre del mensaje (remitente, asunto).
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // Remitente del correo (usará la configuración de .env por defecto si no se especifica 'from')
            // Puedes sobrescribir el 'from' aquí si necesitas un remitente diferente al global de .env
            // from: new Address($this->data['email'], $this->data['nombre']), // Si quieres que el remitente sea el email del usuario
            subject: 'Mensaje de Contacto - ' . $this->data['asunto'], // Asunto del correo, usando el asunto del formulario
        );
    }

    /**
     * Obtiene la definición del contenido del mensaje.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact', // La vista Blade que contendrá el cuerpo del correo. ¡Ahora en la ruta correcta!
            // Puedes pasar variables adicionales a la vista del email aquí si es necesario
            // with: [
            //     'nombreUsuario' => $this->data['nombre'],
            // ],
        );
    }

    /**
     * Obtiene los adjuntos para el mensaje.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return []; // No necesitamos adjuntos para un formulario de contacto simple
    }
}
