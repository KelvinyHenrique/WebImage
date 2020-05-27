<?php 

    require './main.php';

    if(isset($_FILES['image']) && !empty($_FILES['image']) && isset($_POST['width']) && !empty($_POST['width']) && isset($_POST['height']) && !empty($_POST['height'])) {
    
    $files = $_FILES;
    $post  = $_POST;

    $crop = new Imagens();
    $retorno = $crop->cortar($files, $post);
    header("Location: ../../index.php");
    } else {
        echo "Arquivos não enviados corretamente";
    }
?>