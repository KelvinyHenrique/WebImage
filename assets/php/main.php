<?php


function cortar1() {
        // O caminho da nossa imagem no servidor
    $caminho_imagem = '../../image/download.jpg';

    // Retorna o identificador da imagem
    $imagem = imagecreatefromjpeg($caminho_imagem);

    // Cria duas variáveis com a largura e altura da imagem
    list( $largura, $altura ) = getimagesize( $caminho_imagem );

    // Nova largura e altura
    $nova_largura = $_POST['width'];
    $nova_altura = $_POST['height'];

    // Cria uma nova imagem em branco
    $nova_imagem = imagecreatetruecolor( $nova_largura, $nova_altura );

    // Copia a imagem para a nova imagem com o novo tamanho
    imagecopyresampled(
        $nova_imagem, // Nova imagem 
        $imagem, // Imagem original
        0, // Coordenada X da nova imagem
        0, // Coordenada Y da nova imagem 
        0, // Coordenada X da imagem 
        0, // Coordenada Y da imagem  
        $nova_largura, // Nova largura
        $nova_altura, // Nova altura
        $largura, // Largura original
        $altura // Altura original
    );

    // Cria a imagem
    imagejpeg( $nova_imagem, 'nova_imagem.jpg', 100 );

    // Remove as imagens temporárias
    imagedestroy($imagem);
    imagedestroy($nova_imagem);
}

cortar4();

function cortar2() {
    $im = imagecreatefromjpeg('../../image/download.jpg');
    $size = min(imagesx($im), imagesy($im));
    $im2 = imagecrop($im, ['x' => 0, 'y' => 0, 'width' => $size, 'height' => $size]);
    if ($im2 !== FALSE) {
        imagepng($im2, 'example-cropped.png');
        imagedestroy($im2);
    }
    imagedestroy($im);
    }

function cortar3(){
    $dst_x = 0;   // X-coordinate of destination point
    $dst_y = 0;   // Y-coordinate of destination point
    $src_x = 100; // Crop Start X position in original image
    $src_y = 100; // Crop Srart Y position in original image
    $dst_w = 160; // Thumb width
    $dst_h = 120; // Thumb height
    $src_w = 260; // Crop end X position in original image
    $src_h = 220; // Crop end Y position in original image
    
    // Creating an image with true colors having thumb dimensions (to merge with the original image)
    $dst_image = imagecreatetruecolor($dst_w, $dst_h);
    // Get original image
    $src_image = imagecreatefromjpeg('../../image/download.jpg');
    // Cropping
    imagecopyresampled($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);
    // Saving
    imagejpeg($dst_image, 'crop.jpg');
}

function cortar4() {
    $image = $_FILES;
    $NewImageName = Rand(4,10000)."-". $image['image']['name'];
    $destination = realpath('../../image').'/';
    move_uploaded_file($image['image']['tmp_name'], $destination.$NewImageName);
    $image = imagecreatefromjpeg($destination.$NewImageName);
    $filename = $destination.$NewImageName;

    $thumb_width = 200;
    $thumb_height = 150;

    $width = imagesx($image);
    $height = imagesy($image);

    $original_aspect = $width / $height;
    $thumb_aspect = $thumb_width / $thumb_height;

    if ( $original_aspect >= $thumb_aspect )
    {
       // If image is wider than thumbnail (in aspect ratio sense)
       $new_height = $thumb_height;
       $new_width = $width / ($height / $thumb_height);
    }
    else
    {
       // If the thumbnail is wider than the image
       $new_width = $thumb_width;
       $new_height = $height / ($width / $thumb_width);
    }

    $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

    // Resize and crop
    imagecopyresampled($thumb,
                       $image,
                       0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                       0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                       0, 0,
                       $new_width, $new_height,
                       $width, $height);
    imagejpeg($thumb, $filename, 80);
    echo "cropped"; die;

}

?>