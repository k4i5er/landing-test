# landing-test

Es un ejemplo de un proyecto fullstack usando Apache Web Server/PHP 7.2.28 en el lado del back-end y HTML5/CSS3/Javascript del lado del front-end.

El endpoint es un script llamado processForm.php, el cual usa la librería PHPMailer para el envío de la información de un formulario capturada por el usuario hacia un buzón de correo. Este endpoint se encuentra en la ruta /backend del servidor y devuelve un JSON con un código de status para validarlo en el front-end y actuar en consecuencia.

Del lado del front-end, se usa fetch para realizar la llamada asíncrona al servidor, esperando un código de status para ser evaluado y mostrar un feedback al usuario.

Existen detalles al parecer por el CORS del lado del servidor, lo cual propicia que en ciertas ocasiones no se realice el envío de la información desde un dispositivo móvil.

 En futuras versiones, se implementaría la validación de los campos y la corrección del problema de CORS.
