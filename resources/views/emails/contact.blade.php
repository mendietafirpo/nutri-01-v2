<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nuevo Mensaje de Contacto</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333;">
    <h2>Has recibido un nuevo mensaje desde el formulario web:</h2>
    
    <p><strong>Nombre:</strong> {{ $details['name'] }}</p>
    <p><strong>Correo electrónico:</strong> {{ $details['email'] }}</p>
    <p><strong>Teléfono:</strong> {{ $details['cellPhone'] }}</p>
    <p><strong>Ciudad:</strong> {{ $details['city'] }}</p>
    <p><strong>País:</strong> {{ $details['country'] }}</p>
    
    <hr>
    
    <p><strong>Mensaje:</strong></p>
    <p style="background: #f9f9f9; padding: 15px; border-left: 4px solid #f97316;">
        {!! nl2br(e($details['message'])) !!}
    </p>
</body>
</html>