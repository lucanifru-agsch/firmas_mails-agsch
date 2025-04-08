<?php
    $version = "1.7";
 
    
    $nombre = $_GET['nombre'] ?? "";
    $cargo = $_GET['cargo'] ?? "";
    $linea3 = $_GET['linea3'] ?? "Asociación de Guías y Scouts de Chile";
    $correo = $_GET['correo'] ?? "";
    $telefono = $_GET['telefono'] ?? "";

?>
<!DOCTYPE html>
<html lang="es">
<!-- Desarrollado por Lu Canifrú -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Firma Institucional - AGSCH</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
    <link rel="stylesheet" href="styles.css?v=<?=$version; ?>">

    
    <link rel="apple-touch-icon" sizes="180x180" href="https://api.agsch.org/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://api.agsch.org/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://api.agsch.org/favicon/favicon-16x16.png">
    <link rel="mask-icon" href="https://api.agsch.org/favicon/safari-pinned-tab.svg" color="#001558">
    <link rel="shortcut icon" href="https://api.agsch.org/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#001558">
    <meta name="msapplication-config" content="https://api.agsch.org/favicon/browserconfig.xml">
    <meta name="theme-color" content="#f7f9ff">

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    
    <meta property="og:url" content="https://firmas.agsch.org/">
    <meta name="description" content="Generador de firma institucional para correos electrónicos y documentos digitales de la Asociación de Guías y Scouts de Chile." />
    <meta property="og:title" content="Generador de Firmas">
    <meta property="og:description" content="Generador de firma institucional para correos electrónicos y documentos digitales de la Asociación de Guías y Scouts de Chile.">
    <meta property="og:image" content="https://firmas.agsch.org/op.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Generador de Firmas">
    <meta name="twitter:description" content="Generador de firma institucional para correos electrónicos y documentos digitales de la Asociación de Guías y Scouts de Chile.">
    <meta name="twitter:image" content="https://firmas.agsch.org/op.png">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Generador de Firmas">
</head>

<body>
    <div class="container" style="max-width: 600px;">
        <div class="row mt-4 mb-4 pr-3 pl-3" style="background-color: #fff;border-radius: 20px;">
            <div class="col-md-12 mt-2 mb-0">
                <div style="text-align: center;"><img src="https://firmas.agsch.org/agsch_firma_logo.png" alt="Logo"
                        width="150"></div>
                <h3 class="mb-4 mt-0" style="text-align: center; text-transform: uppercase; color: #001558; font-size: 1.3rem;">Generador
                    de
                    Firma Institucional</h3>
                <form id="firmaForm">
                    <div class="form-group mb-2">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre Completo" value="<?=$nombre; ?>" required>
                        <p class="text-muted m-0"><small>Recuerda respetar las mayúsculas correspondientes al nombre.</small></p>
                    </div>
                    <div class="form-group mb-2">
                        <label for="cargo">Cargo:</label>
                        <input type="text" class="form-control" id="cargo" placeholder="Cargo Institucional" value="<?=$cargo; ?>">
                    </div>
                    <div class="form-group mb-2">
                        <label for="empresa">Linea 3:</label>
                        <input type="text" class="form-control" id="empresa"
                            placeholder="Asociación de Guías y Scouts de Chile" value="<?=$linea3; ?>" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="correo">Correo:</label>
                        <input type="text" class="form-control" id="correo" placeholder="usuario@guiasyscoutschile.cl" value="<?=$correo; ?>"
                            required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" class="form-control" id="telefono" value="<?=$telefono; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Generar Firma</button>
                </form>
            </div>
            <div class="col-md-12 mt-4 mb-4" id="preview" style="display:none;">
                <h3 id="prev" style="display:none;">Previsualización de Firma</h3>
                <div id="firmaPreview">
                    <!-- Aquí se mostrará la previsualización de la firma -->
                </div>
            </div>
            <div class="col-md-12">

                <button id="copyButton" class="btn btn-secondary mt-3 exclude-copy btn-block" style="display:none;">Copiar
                    Firma</button>

            </div>
            <div class="col-md-12 mb-4">

                <button id="modalButton" type="button" class="btn btn-primary mt-3 exclude-copy btn-block"
                    data-toggle="modal" data-target="#instruccionesModal">Ver Instrucciones</button>

            </div>
        </div>
    </div>


    <!-- Modal de instrucciones para Gmail -->
    <div class="modal fade" id="instruccionesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header pb-2">
                    <h5 class="modal-title" id="exampleModalLabel">Instrucciones</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Aquí puedes colocar las instrucciones para Gmail -->
                    <!-- <p>1. Copia la firma haciendo click en el boton "Copiar Firma".</p>
                    <p>2. Abre Gmail y ve a Configuración.</p>
                    <p>3. Desplázate hacia abajo hasta encontrar la sección de firmas.</p>
                    <p>4. Haz clic en "Crear nueva firma" y agrega un nombre.</p>
                    <p>5. Pega la firma generada en el cuadro de firma.</p>
                    <p>6. Haz clic en "Guardar cambios".</p> -->
                    <!-- Puedes agregar más instrucciones si es necesario -->
                    
<p dir="ltr" style="line-height: 1.38; margin-bottom: 0pt; margin-top: 0pt;"><span style="color: #000000; font-family: Arial, sans-serif; font-size: 11pt;"><span style="text-decoration-line: none; vertical-align: baseline; white-space: pre-wrap;"><strong>Paso 1: Genera la Firma</strong></span></span></p>
<ol style="margin-bottom: 0px; margin-top: 0px; padding-inline-start: 48px;">
<!-- <li  aria-level="1"><span style="color: #000000; font-family: Arial, sans-serif; font-size: 11pt;"><span style="text-decoration-line: none; vertical-align: baseline; white-space: pre-wrap;">Ingresa al enlace:&nbsp; </span></span><a style="text-decoration-line: none;" href="https://firmas.agsch.org/" target="_blank" rel="noopener noreferrer"><span style="color: #1155cc; font-family: Arial, sans-serif; font-size: 11pt;"><span style="text-decoration-skip-ink: none; vertical-align: baseline; white-space: pre-wrap;"><span style="text-decoration-line: underline;">https://firmas.agsch.org</span></span></span></a></li> -->
<li  aria-level="1"><span style="color: #000000; font-family: Arial, sans-serif; font-size: 11pt;"><span style="text-decoration-line: none; vertical-align: baseline; white-space: pre-wrap;">Completa el formulario con la informaci&oacute;n solicitada.</span></span></li>
<li  aria-level="1"><span style="color: #000000; font-family: Arial, sans-serif; font-size: 11pt;"><span style="text-decoration-line: none; vertical-align: baseline; white-space: pre-wrap;">Haz clic en el bot&oacute;n &ldquo;Generar Firma&rdquo;</span></span></li>
<li  aria-level="1"><span style="color: #000000; font-family: Arial, sans-serif; font-size: 11pt;"><span style="text-decoration-line: none; vertical-align: baseline; white-space: pre-wrap;">Revisa que la firma generada est&eacute; correcta.</span></span></li>
<li  aria-level="1"><span style="color: #000000; font-family: Arial, sans-serif; font-size: 11pt;"><span style="text-decoration-line: none; vertical-align: baseline; white-space: pre-wrap;">Haz clic en el bot&oacute;n &ldquo;Copiar Firma&rdquo;,</span></span></li>
</ol>
<p dir="ltr" style="line-height: 1.38; margin-bottom: 0pt; margin-top: 0pt;">&nbsp;</p>
<p dir="ltr" style="line-height: 1.38; margin-bottom: 0pt; margin-top: 0pt;"><span style="color: #000000; font-family: Arial, sans-serif; font-size: 11pt;"><span style="text-decoration-line: none; vertical-align: baseline; white-space: pre-wrap;"><strong>Paso 2: Acceder a la configuraci&oacute;n de Gmail</strong></span></span></p>
<ol style="margin-bottom: 0px; margin-top: 0px; padding-inline-start: 48px;" start="6">
<li  aria-level="1"><span style="color: #000000; font-family: Arial, sans-serif; font-size: 11pt;"><span style="text-decoration-line: none; vertical-align: baseline; white-space: pre-wrap;">Abre tu navegador web y ve a Gmail.</span></span></li>
<li  aria-level="1"><span style="color: #000000; font-family: Arial, sans-serif; font-size: 11pt;"><span style="text-decoration-line: none; vertical-align: baseline; white-space: pre-wrap;">Inicia sesi&oacute;n en tu cuenta de Gmail si a&uacute;n no lo has hecho.</span></span></li>
</ol>
<p dir="ltr" style="line-height: 1.38; margin-bottom: 0pt; margin-top: 0pt;">&nbsp;</p>
<p dir="ltr" style="line-height: 1.38; margin-bottom: 0pt; margin-top: 0pt;"><span style="color: #000000; font-family: Arial, sans-serif; font-size: 11pt;"><span style="text-decoration-line: none; vertical-align: baseline; white-space: pre-wrap;"><strong>Paso 3: Navegar a la configuraci&oacute;n de Gmail</strong></span></span></p>
<ol style="margin-bottom: 0px; margin-top: 0px; padding-inline-start: 48px;">
<li  aria-level="1"><span style="color: #000000; font-family: Arial, sans-serif; font-size: 11pt;"><span style="text-decoration-line: none; vertical-align: baseline; white-space: pre-wrap;">En la esquina superior derecha de la p&aacute;gina, haz clic en el icono de ajustes (⚙️) y selecciona "Ver toda la configuraci&oacute;n" en el men&uacute; desplegable.</span></span></li>
</ol>
<p dir="ltr" style="line-height: 1.38; margin-bottom: 0pt; margin-top: 0pt;">&nbsp;</p>
<p dir="ltr" style="line-height: 1.38; margin-bottom: 0pt; margin-top: 0pt;"><span style="color: #000000; font-family: Arial, sans-serif; font-size: 11pt;"><span style="text-decoration-line: none; vertical-align: baseline; white-space: pre-wrap;"><strong>Paso 4: Configurar la firma</strong></span></span></p>
<ol style="margin-bottom: 0px; margin-top: 0px; padding-inline-start: 48px;">
<li  aria-level="1"><span style="color: #000000; font-family: Arial, sans-serif; font-size: 11pt;"><span style="text-decoration-line: none; vertical-align: baseline; white-space: pre-wrap;">En la parte superior de la p&aacute;gina de configuraci&oacute;n, haz clic en la pesta&ntilde;a "General".</span></span></li>
<li  aria-level="1"><span style="color: #000000; font-family: Arial, sans-serif; font-size: 11pt;"><span style="text-decoration-line: none; vertical-align: baseline; white-space: pre-wrap;">Despl&aacute;zate hacia abajo hasta encontrar la secci&oacute;n "Firma".</span></span></li>
<li  aria-level="1"><span style="color: #000000; font-family: Arial, sans-serif; font-size: 11pt;"><span style="text-decoration-line: none; vertical-align: baseline; white-space: pre-wrap;">Haz clic en "+ Crear nueva firma" y agrega un nombre para identificarla y haz clic en el bot&oacute;n &ldquo;crear&rdquo;.</span></span></li>
<li  aria-level="1"><span style="color: #000000; font-family: Arial, sans-serif; font-size: 11pt;"><span style="text-decoration-line: none; vertical-align: baseline; white-space: pre-wrap;">En el cuadro de texto de la firma, pega la firma entregada por el generador.</span></span></li>
</ol>
<p dir="ltr" style="line-height: 1.38; margin-bottom: 0pt; margin-top: 0pt;">&nbsp;</p>
<p dir="ltr" style="line-height: 1.38; margin-bottom: 0pt; margin-top: 0pt;"><span style="color: #000000; font-family: Arial, sans-serif; font-size: 11pt;"><span style="text-decoration-line: none; vertical-align: baseline; white-space: pre-wrap;"><strong>Paso 5: Establecer la firma como predeterminada</strong></span></span></p>
<ol style="margin-bottom: 0px; margin-top: 0px; padding-inline-start: 48px;">
<li  aria-level="1"><span style="color: #202124; font-family: Arial, sans-serif; font-size: 11pt;"><span style="text-decoration-line: none; vertical-align: baseline; white-space: pre-wrap;">Aseg&uacute;rate de que en la secci&oacute;n &ldquo;Valores predeterminados de firma&rdquo; est&eacute; seleccionada en ambas casillas, la firma que acabas de crear.</span></span></li>
<li  aria-level="1"><span style="color: #000000; font-family: Arial, sans-serif; font-size: 11pt;"><span style="text-decoration-line: none; vertical-align: baseline; white-space: pre-wrap;">Aseg&uacute;rate de que la casilla de verificaci&oacute;n "Insertar esta firma antes del texto citado en las respuestas" est&eacute; marcada si deseas que tu firma se agregue autom&aacute;ticamente a tus respuestas de correo electr&oacute;nico.</span></span></li>
<li  aria-level="1"><span style="color: #000000; font-family: Arial, sans-serif; font-size: 11pt;"><span style="text-decoration-line: none; vertical-align: baseline; white-space: pre-wrap;">Despl&aacute;zate hasta la parte inferior de la p&aacute;gina y haz clic en "Guardar cambios" para aplicar la firma.</span></span></li>
</ol>
<p dir="ltr" style="line-height: 1.38; margin-bottom: 0pt; margin-top: 0pt;">&nbsp;</p>
<p dir="ltr" style="line-height: 1.38; margin-bottom: 0pt; margin-top: 0pt;"><span style="color: #000000; font-family: Arial, sans-serif; font-size: 11pt;"><span style="text-decoration-line: none; vertical-align: baseline; white-space: pre-wrap;"><strong>Paso 6: Verificar la configuraci&oacute;n de la firma</strong></span></span></p>
<ol style="margin-bottom: 0px; margin-top: 0px; padding-inline-start: 48px;">
<li  aria-level="1"><span style="color: #000000; font-family: Arial, sans-serif; font-size: 11pt;"><span style="text-decoration-line: none; vertical-align: baseline; white-space: pre-wrap;">Abre un nuevo correo electr&oacute;nico para comprobar que la firma se ha agregado correctamente.</span></span></li>
<li  aria-level="1"><span style="color: #000000; font-family: Arial, sans-serif; font-size: 11pt;"><span style="text-decoration-line: none; vertical-align: baseline; white-space: pre-wrap;">La firma deber&iacute;a aparecer autom&aacute;ticamente al crear un nuevo correo electr&oacute;nico o responder a un mensaje.</span></span></li>
</ol>
<p dir="ltr" style="line-height: 1.38; margin-bottom: 0pt; margin-top: 0pt;">&nbsp;</p>
<p dir="ltr" style="line-height: 1.38; margin-bottom: 0pt; margin-top: 0pt;"><span style="color: #000000; font-family: Arial, sans-serif; font-size: 11pt;"><span style="text-decoration-line: none; vertical-align: baseline; white-space: pre-wrap;">&iexcl;Listo! Has agregado con &eacute;xito una firma personalizada y la has establecido como predeterminada en tu cuenta de Gmail. Ahora tus correos electr&oacute;nicos tendr&aacute;n un toque personalizado y profesional.</span></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <script src="script.js?v=<?=$version; ?>"></script>
    
</body>

</html>