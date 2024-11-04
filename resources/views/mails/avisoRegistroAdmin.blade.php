<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Usuario Registrado</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f8f8f8; border-radius: 5px;">
        <tr>
            <td style="padding: 20px;">
                <h1 style="color: #4a4a4a; text-align: center; margin-bottom: 20px;">Nuevo Usuario Registrado</h1>
                <p style="margin-bottom: 15px;">Estimado Administrador,</p>
                <p style="margin-bottom: 15px;">Le informamos que un nuevo usuario se ha registrado en su sistema. A continuación, se detallan los datos del registro:</p>
                <table width="100%" style="background-color: #ffffff; border-radius: 5px; margin-bottom: 20px;">
                    <tr>
                        <td style="padding: 15px;">
                            <p style="margin: 5px 0;"><strong>Nombre:</strong> {{$user->username}} </p>
                            <p style="margin: 5px 0;"><strong>Email:</strong> {{$user->email}} </p>
                            <p style="margin: 5px 0;"><strong>Fecha de Registro:</strong> {{$user->created_at}} </p>
                        </td>
                    </tr>
                </table>
                <p style="margin-bottom: 15px;">Por favor, revise esta información y tome las acciones necesarias según las políticas de su sistema.</p>
                <p style="margin-bottom: 15px;">Si necesita más detalles, puede acceder al panel de administración haciendo clic en el siguiente botón:</p>
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="center">
                            <a href="#" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: #ffffff; text-decoration: none; border-radius: 5px; font-weight: bold;">Acceder al Panel</a>
                        </td>
                    </tr>
                </table>
                <p style="margin-top: 20px; font-style: italic; text-align: center; color: #888888;">Este es un mensaje automático, por favor no responda a este correo.</p>
            </td>
        </tr>
    </table>
</body>
</html>