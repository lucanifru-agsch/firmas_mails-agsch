<?php
// Obtener el valor de la variable GET 'campana'
$campana = $_GET['campana'] ?? 'No dejes que la rábia te domine cuidemos su única infancia ';

// Crear objeto Imagick y configurar los parámetros de la imagen
$image = new Imagick();
$image->newImage(400, 100, new ImagickPixel('transparent'));
$image->setImageFormat('png');

// Configurar el estilo del texto
$textStyle = [
    'font-family' => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"',
    'font-size' => 15,
    'line-height' => 1.5,
    'color' => '#676767',
    'margin-top' => 5,
    'text-align' => 'center',
];

// Crear el objeto ImagickDraw para dibujar el texto
$textDraw = new ImagickDraw();
$textDraw->setFillColor($textStyle['color']);
$textDraw->setFont($textStyle['font-family']);
$textDraw->setFontSize($textStyle['font-size']);
$textDraw->setTextAlignment(Imagick::ALIGN_CENTER);

// Calcular la posición y el tamaño del texto
$metrics = $image->queryFontMetrics($textDraw, $campana);
$textWidth = $metrics['textWidth'];
$textHeight = $metrics['textHeight'];
$textX = ($image->getImageWidth() - $textWidth) / 2;
$textY = ($image->getImageHeight() - $textHeight) / 2;

// Agregar el texto al lienzo de la imagen
$image->annotateImage($textDraw, $textX, $textY, 0, $campana);

// Mostrar la imagen
header('Content-type: image/png');
echo $image;
?>