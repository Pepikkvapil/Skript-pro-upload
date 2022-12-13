<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Vas soubor</title>
</head>
<?php
$file = $_FILES["soubor"];
if ($file['size'] > (8 * 1024 * 1024))
{
	echo "Tento soubor je větší než 8 MB";
	exit();
}
$filename = $file["name"];
$target_file = __DIR__ . "/upload/$filename";

$tmp_name = $file["type"];

if ($tmp_name == 'image/jpg' || $tmp_name == 'image/jpeg' || $tmp_name == 'image/gif' || $tmp_name == 'image/png') 
{
    move_uploaded_file($file["tmp_name"], $target_file);
    echo "<img src='/Prehravac/upload/$filename' class='rounded mx-auto d-block' alt='obrazek'>";
}

if ($tmp_name == 'video/mp4' || $tmp_name == 'video/webm' || $tmp_name == 'video/ogg') 
{
    move_uploaded_file($file["tmp_name"], $target_file);
    echo "<div class='text-center'>";
    echo "<video width=800' height='600' class='mx-auto' controls><source src='/Prehravac/upload/$filename' type='$tmp_name'>Your browser does not support the video tag.</video>";
    echo"</div>";
}

if ($tmp_name == 'audio/mpeg' || $tmp_name == 'audio/ogg' || $tmp_name == 'audio/wav') 
{
    move_uploaded_file($file["tmp_name"], $target_file);
    echo "<div class='text-center'>";
    echo "<audio class='mx-auto' controls><source src='/Prehravac/upload/$filename' type='$tmp_name'>Your browser does not support the audio element.</audio>";
    echo"</div>";
}

?>
<body> 
</body>
</html>
