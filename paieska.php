<?php
include('config.php');


function paieska($dir, $name)
{
    $d = opendir($dir);
    $result = 0;
    while ($item = readdir($d)) {
        if ($item == '.' || $item == '..') {
            continue;
        }
        if ($item == $name) {
            echo "$dir/$item<br>";
            $result++;
        }
        if (is_dir($dir . '/' . $item)) {
            $result += paieska($dir . "/" . $item, $name);
        } else {
        }
    }
    closedir($d);
    return $result;
}


if (isset($_POST['ieskoti'])) {
    $file = $_POST['ieskoti'];
echo "<h2>";
    $files = paieska(ROOT_PATH . '/' . $_POST['path'], $file);
echo "</h2>";
    if ($files == 0) {
        echo "<strong><h1>Failas nerastas</h1></strong><br>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <a class="btn btn-primary" href="sistema.php?dir=">Gryzti i pradzia</a>
</body>

</html>