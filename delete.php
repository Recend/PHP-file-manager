<?php
include_once('config.php');


if (isset($_GET['file'])) {

    $file = $_GET['file'];
}
if (!is_dir(ROOT_PATH . '/' . $file)) {
    unlink(ROOT_PATH . '/' . $file);
} else {
    rmdir(ROOT_PATH . '/' . $file);
}

$failas = explode('/', $file);
unset($failas[sizeof($failas) - 1]);
$failas = implode('/', $failas);

?>

failas istrintas <a href="sistema.php?dir=<?= $failas ?>">atgal</a>