<?php

//$campana = "Congreso Guía y Scout para la Reforma | #ConstruyendoUnidad";
// $campana = "#NOHAYEXCUSA | 16 DÍAS DE ACTIVISMO CONTRA LA VIOLENCIA A MUJERES Y NIÑAS";
$campana = "UN GOLPE O UN ABRAZO: MARCA SU FUTURO, CUIDEMOS SU ÚNICA INFANCIA. \nClic aquí para más información.";
// $campana = "";



// Directorio donde se encuentran las imágenes (en el directorio raíz
$imagesDir = __DIR__ . '/';
// Obtener el nombre de la imagen de la URL
$imageName = $_GET['image'];
// die($imageName);
// Ruta completa de la imagen
if($imageName == "campana.png") {


    $campana = $campana ?? '';

$image = new Imagick();
$image->newImage(1, 1, new ImagickPixel('transparent'));
$image->setImageFormat('png');

// Configurar el estilo del texto
$textStyle = [
    'font-family' => 'Roboto-Regular.ttf',
    'font-size' => 11,
    'line-height' => 1.5,
    'color' => '#676767',
    // 'text-align' => 'center',
    'text-align' => 'center',
    'margin' => 3, // Margen de 2px
    'margin-top' => 8,
];

// Crear el objeto ImagickDraw para dibujar el texto
$textDraw = new ImagickDraw();
$textDraw->setFillColor($textStyle['color']);
$textDraw->setFont($textStyle['font-family']);
$textDraw->setFontSize($textStyle['font-size']);
$textDraw->setTextAlignment(\Imagick::ALIGN_CENTER);
// $textDraw->setTextAlignment(Imagick::ALIGN_CENTER);

// Calcular la posición y el tamaño del texto
$metrics = $image->queryFontMetrics($textDraw, $campana);
$textWidth = $metrics['textWidth'] + ($textStyle['margin'] * 2);
$textHeight = $metrics['textHeight'] + ($textStyle['margin'] * 2);

// Crear una nueva imagen con el tamaño adecuado
$image->newImage($textWidth, $textHeight, new ImagickPixel('transparent'));
$image->setImageFormat('png');

// Calcular la posición del texto para dejar un margen de 2px
$textX = $textStyle['margin'];
$textX = $textWidth /2;
// $textY = $textHeight + $textStyle['margin'] - ($metrics['textHeight']/2);
$textY = $textHeight + $textStyle['margin'] - ($metrics['textHeight'])+($textStyle['margin']*2);



// Agregar el texto al lienzo de la imagen
$image->annotateImage($textDraw, $textX, $textY, 0, $campana);

$image->trimImage(.2);

// Obtener tamaño actual después del trim
$width = $image->getImageWidth();
$height = $image->getImageHeight();

// Definir el margen superior
$topMargin = 6;

// Crear una nueva imagen más alta
$finalImage = new Imagick();
$finalImage->newImage($width, $height + $topMargin, new ImagickPixel('transparent'));
$finalImage->setImageFormat('png');

// Componer la imagen original en la nueva, desplazada hacia abajo
$finalImage->compositeImage($image, Imagick::COMPOSITE_DEFAULT, 0, $topMargin);

// Reemplazar la imagen original por la nueva
$image = $finalImage;

// Mostrar la imagen
header('Content-type: image/png');
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");

echo $image;

} elseif($imageName == "op.png") {

// Ruta de la imagen
$imagenOriginal = __DIR__ . '/agsch_firma.png';

// Crear objeto Imagick para la imagen original
$imagen = new Imagick($imagenOriginal);

// Obtener dimensiones de la imagen original
$ancho = $imagen->getImageWidth();
$alto = $imagen->getImageHeight();

// Margen
$margen = 20;

// Crear un lienzo blanco con dimensiones ampliadas para el margen
$lienzoAncho = $ancho + ($margen * 2);
$lienzoAlto = $alto + ($margen * 2);
$fondo = new Imagick();
$fondo->newImage($lienzoAncho, $lienzoAlto, 'white');
$fondo->setImageFormat('png');

// Calcular las coordenadas de superposición para centrar la imagen en el lienzo con el margen
$posX = $margen;
$posY = $margen;

// Combinar la imagen original con el lienzo blanco
$fondo->compositeImage($imagen, Imagick::COMPOSITE_DEFAULT, $posX, $posY);

// Mostrar la imagen resultante
header('Content-type: image/png');
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");

echo $fondo;

} else {
  $imagePath = $imagesDir . $imageName;

    // Verificar si la imagen existe
    if (file_exists($imagePath)) {
        // Obtener el tipo MIME de la imagen
        $imageType = mime_content_type($imagePath);

        // Enviar encabezados HTTP para deshabilitar el almacenamiento en caché del navegador
        header("Content-Type: $imageType");
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");

        // Leer la imagen y mostrarla
        readfile($imagePath);
    } else {
        // Si la imagen no existe, devolver un error 404
        http_response_code(404);
        echo 'Imagen no encontrada';
    }
}
?>