<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Mensaje de Contacto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #e1e1e1;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background-color: #007bff;
            color: #ffffff;
            padding: 15px;
            border-radius: 8px 8px 0 0;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }
        .email-body {
            padding: 20px;
            line-height: 1.6;
        }
        .email-body p {
            margin: 10px 0;
        }
        .email-footer {
            text-align: center;
            padding: 15px;
            font-size: 12px;
            color: #777;
            border-top: 1px solid #e1e1e1;
        }
        .strong {
            font-weight: bold;
            color: #000;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            Nuevo Mensaje de Contacto
        </div>
        <div class="email-body">
            <p><span class="strong">Nombre:</span> {{ $data['nombre'] }}</p>
            <p><span class="strong">Email:</span> {{ $data['email'] }}</p>
            <p><span class="strong">Mensaje:</span></p>
            <p>{{ $data['mensaje'] }}</p>
        </div>
        <div class="email-footer">
            Este mensaje fue enviado desde el formulario de contacto de <strong>Luce Gym</strong>.
        </div>
    </div>
</body>
</html>
