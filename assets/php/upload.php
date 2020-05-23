<?php

$uploaddir = "../../image/";

$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

$json = json_encode($_FILES);
echo($json);

?>