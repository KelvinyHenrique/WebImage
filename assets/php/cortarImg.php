<?php 

    require './main.php';

    $files = $_FILES;
    $post  = $_POST;

    $crop = new Imagens();
    $retorno = $crop->cortar($files, $post);

?>

<img src="../../images/<?php echo $retorno;?>"/>