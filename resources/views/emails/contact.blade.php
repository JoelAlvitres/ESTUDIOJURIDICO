    {{-- resources/views/emails/contact.blade.php --}}
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nuevo Mensaje de Contacto</title>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9; }
            .header { background-color: #004080; color: #fff; padding: 10px 20px; border-radius: 8px 8px 0 0; text-align: center; }
            .content { padding: 20px; }
            .footer { text-align: center; font-size: 0.8em; color: #666; margin-top: 20px; }
            p { margin-bottom: 10px; }
            strong { color: #004080; }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h2>Nuevo Mensaje del Formulario de Contacto</h2>
            </div>
            <div class="content">
                <p>Has recibido un nuevo mensaje a través del formulario de contacto de tu sitio web.</p>
                <p><strong>Nombre:</strong> {{ $data['nombre'] }}</p>
                <p><strong>Email:</strong> <a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a></p>
                <p><strong>Asunto:</strong> {{ $data['asunto'] }}</p>
                <p><strong>Mensaje:</strong></p>
                <p style="white-space: pre-wrap; background-color: #eee; padding: 15px; border-radius: 5px;">{{ $data['mensaje'] }}</p>
            </div>
            <div class="footer">
                <p>Este es un mensaje automático, por favor no respondas a este correo.</p>
                <p>&copy; {{ date('Y') }} Rodas Elías Abogados. Todos los derechos reservados.</p>
            </div>
        </div>
    </body>
    </html>
    