<?php


    class Imagens {

        function teste() {
                    //diretório para salvar as imagens
        $diretorio = "imagens/";
        //Verificar a existência do diretório para salvar as imagens e informa se o caminho é um diretório
        if(!is_dir($diretorio)){ 
            echo "Pasta $diretorio nao existe";
        }else{    
            $arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
            //loop para ler as imagens
            for ($controle = 0; $controle < count($arquivo['name']); $controle++){        
                $destino = $diretorio."/".$arquivo['name'][$controle];
                //realizar o upload da imagem em php
                //move_uploaded_file — Move um arquivo enviado para uma nova localização
                if(move_uploaded_file($arquivo['tmp_name'][$controle], $destino)){
                    echo "Upload realizado com sucesso<br>"; 
                }else{
                    echo "Erro ao realizar upload";
                }        
            }
}
        }

        function cortar($files, $post) {
            
            $image = $files;
            $NewImageName = Rand(7,10000).".png";
            $destination = realpath('../../images').'/';
            move_uploaded_file($image['image']['tmp_name'], $destination.$NewImageName);
            $image = imagecreatefromjpeg($destination.$NewImageName);
            $filename = $destination.$NewImageName;
        
           /* $thumb_width = 200;
            $thumb_height = 150;*/
            $thumb_width = $post['width'];
            $thumb_height = $post['height'];
        
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
            return $NewImageName;          
        }
        
    }

?>