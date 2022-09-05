<?php

session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] == 1)) {
    header("location:login.php");
    die();
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION);
    die();
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
    <style>
        li {
            list-style-type: none;
        }

        a {
            text-decoration: none;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="container col-5">
        <h1 class="text-center">Failai</h1>

        <?php

        include_once('config.php');

        $dir = "";
        $diras = "";
        $file = "";

        if (isset($_GET['dir'])) {
            $file = $_GET['dir'];
        }

        $failas = explode('/', $file);
        unset($failas[sizeof($failas) - 1]);
        $failas = implode('/', $failas);



        function printDir($dir)
        {

            $d = opendir(ROOT_PATH . '/' . $dir);
            echo "<ul>";

            while ($item = readdir($d)) {
                if ($item == '.' || $item == '..') {
                    continue;
                }
                if (is_dir(ROOT_PATH . '/' . $dir . '/' . $item)) {
                    echo "<li class='mt-2'><img src='assets/folder-svgrepo-com.svg' style='width:24px'><a href='?dir=" . $dir . '/' . $item . "'>$item</a>";
                    echo "<a class='float-end text-danger' href='delete.php?file=$dir/$item'><img class='ms-5' src='assets/delete-svgrepo-com.svg' style='width:24px'>Trinti</a>";
                    echo "</li>";
                } else {
                    echo "<li class='mt-2'>";
                    $ext = pathinfo(ROOT_PATH . '/' . $dir . "/" . $item, PATHINFO_EXTENSION);
                    if ($ext == 'php') {
                        echo "<img src='assets/php.svg' style='width:24px'>";
                    } else if ($ext == 'txt') {
                        echo "<img src='assets/txt-file-symbol-svgrepo-com.svg' style='width:24px'>";
                    } else if ($ext == 'svg') {
                        echo "<img src='assets/svg-svgrepo-com.svg' style='width:24px'>";
                    }

                    echo "<a>$item</a>";
                    if ($ext == 'php' || $ext == 'txt') {
                        echo "<a class='float-end text-danger' href='delete.php?file=$dir/$item'><img class='ms-5' src='assets/delete-svgrepo-com.svg' style='width:24px'>Trinti</a>";
                        echo "<a class='text-warning float-end' href='edit.php?file=$dir/$item'><img class='ms-5' src='assets/edit-svgrepo-com.svg' style='width:24px'>Redaguoti</a>";
                     
                    }
                    echo "</li>";
                }
            }
            closedir($d);
            echo "</ul>";
        }

        $dir = '';
        if (isset($_GET['dir'])) {
            $dir = $_GET['dir'];
        }
        ?>
        <h2>Failo paieska</h2>
        <form action="paieska.php" method="POST" class="d-flex mt-3" role="search">
            <input type="hidden" name="path" value="<?= $dir ?>">
            <input name="ieskoti" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <hr>
        </form>
        <div class="d-flex justify-content-center">
            <div>
            <?php echo "<a class='btn btn-secondary mt-3' href=sistema.php?dir=$failas>Atgal</a>";?>
            </div>
        </div>
        <?php
        printDir($dir);
        ?>
        <hr>
        <h2 class="mt-3">Naujo katalogo sukurimas</h2>
        <form action="new.php" method="POST">
            <input type="hidden" name="path" value="<?= $dir ?>">
            <input class="form-control" type="text" name="katalogas" placeholder="Katalogo pavadinimas"><br>
            <button class="btn btn-success">Kurti kataloga</button>
        </form>
        <hr>
        <a class="btn btn-primary" href="login.php?logout=1">Atsijungti</a>
    </div>
</body>

</html>