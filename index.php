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
        <form class="formImage" action="./assets/php/cortarImg.php" method="post" enctype="multipart/form-data">      
        <input type="file" name="image[]" multiple="multiple" id="file" class="inputfile" />
        <label for="file">Escolha um arquivo</label>     
        
        <div>
            <button class="btnEnviar" type="submit">Enviar</button>
        </div>

        <div>
            <input class="input" type="number" placeholder="Largura" name="width">
            <input class="input" type="number" placeholder="Altura" name="height">
        </div>
        </form>
    </div>

</body>
</html>