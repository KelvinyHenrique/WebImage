<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Crop</title>
    <link rel="stylesheet" href="./assets/css/main.css">
</head>
<body>

    <div class="container">
<<<<<<< HEAD
        <form class="formImage" action="./assets/php/cortarImg.php" method="post" enctype="multipart/form-data">      
        <input type="file" name="image[]" multiple="multiple" id="file" class="inputfile" />
=======
        <form class="formImage" action="./assets/php/upload.php" method="post" enctype="multipart/form-data">      
        <input type="file" name="userfile" id="file" class="inputfile" />
>>>>>>> b9576ba6c71d95933666f73d11957b3db15f7ad6
        <label for="file">Escolha um arquivo</label>     
        
        <div>
            <button class="btnEnviar" type="submit">Enviar</button>
        </div>

        <div>
<<<<<<< HEAD
            <input class="input" type="number" placeholder="Largura" name="width">
            <input class="input" type="number" placeholder="Altura" name="height">
=======
            <input   type="number" placeholder="Informe a largura da imagem" name="width">
            <input type="number" placeholder="Informe a altura da imagem" name="height">
            <input type="number" placeholder="Informe a altura da imagem" name="height">

            <input type="number" placeholder="Informe a altura da imagem" name="height">
>>>>>>> b9576ba6c71d95933666f73d11957b3db15f7ad6
        </div>
        </form>
    </div>

</body>
</html>