<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    if (isset($_POST['pirmas'])) {
        $pirmas = $_POST['pirmas'];
        $antras = $_POST['antras'];

        echo dbd($pirmas, $antras);
    }

    function dbd($a, $b)
    {
        if ($a == $b) {
            return $a;
        }
        if ($a < $b) {
           return dbd($a, $b - $a);
        } else {
           return dbd($a - $b, $b);
        }
    }

    ?>

    <form action="" method="POST">
        <input type="text" name="pirmas"> <br>
        <input type="text" name="antras"> <br>
        <button>Skaiciuoti</button>
    </form>
</body>

</html>