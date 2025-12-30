<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Contacto</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f4f4; font-family:Arial, Helvetica, sans-serif;">
  <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f4; padding:20px 0;">
    <tr>
      <td align="center">
        <table width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-radius:8px; overflow:hidden;">
          
          <!-- Header -->
          <tr>
            <td style="background-color:#111827; padding:20px; text-align:center;">
              <h1 style="color:#ffffff; margin:0; font-size:24px;">
                IlustraEventos
              </h1>
            </td>
          </tr>

          <!-- Content -->
          <tr>
            <td style="padding:30px; color:#333333;">
              <h2 style="margin-top:0; font-size:20px;">
                Hola, {{ $contact->name }} ha creado una solicitud de contacto
              </h2>

               <label style="font-weight:bold">Teléfono:</label>
              <span style="font-size:16px; line-height:1.5;">
                {{$contact->phone}}
              </span>
              <br>
              <br>
              <label style="font-weight:bold">Mensaje:</label>
              <br>
              <span style="font-size:16px; line-height:1.5;">
                {{$contact->message}}
              </span>


              <p style="font-size:14px; color:#666666;">
                Si no solicitaste este correo, puedes ignorarlo.
              </p>

              <p style="font-size:14px; color:#666666;">
                Saludos,<br>
                <strong>IlustraEventos</strong>
              </p>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="background-color:#f9fafb; padding:15px; text-align:center; font-size:12px; color:#999999;">
              © {{ date('Y') }} - IlustraEventos. Todos los derechos reservados.
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</body>
</html>