<?php
include_once('config.php');


if (isset($_GET['file'])) {
    $file = $_GET['file'];
    if (isset($_POST['content'])) {
        $content = $_POST['content'];
        file_put_contents(ROOT_PATH . '/' . $file, $content);
    }
    $content = file_get_contents(ROOT_PATH . '/' . $file);
}

$failas = explode('/', $file);
unset($failas[sizeof($failas) - 1]);
$failas = implode('/', $failas);

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
    <div class="container">
    <a class="btn btn-secondary" href="sistema.php?dir=<?= $failas ?>">Atgal</a>
    <h1>Failo pavadininas <?= ROOT_PATH . '/' . $file ?></h1>
    <form action="" method="POST">
        <textarea name="content" id="" cols="100" rows="30"><?= $content ?></textarea> <br>
        <button class="btn btn-success">Išsaugoti</button>
    </form>
    </div>
</body>

</html>