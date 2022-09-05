<?php

if (isset($_POST['user'])) {
    setcookie('username',$username = $_POST['user'], time()+60*60*24);
  }

session_start();

password_hash('admin', PASSWORD_DEFAULT);

if (isset($_POST['user']) && isset($_POST['password'])) {
    $password = $_POST['password'];
    if ($_POST['user'] == 'admin' && password_verify($password, '$2y$10$RCuv73Rufv6sLpEYkh858e.OqgwX9N/78xalsXQXUlzxDSa0SigXe')) {
        $_SESSION['login'] = 1;
        $_SESSION['user'] = $_POST['user'];
        header("location:sistema.php");
        die();
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
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
    <div class="container">
        <h1 class="text-center">PRISIJUNGIMAS</h1>
        <div class="col-5 mx-auto mt-4">
            <form class="form-control" action="" method="POST">
                <label for="username">Username:</label>
                <input id="username" class="form-control" type="text" name="user" value="<?php if (isset($_COOKIE["username"])) {
                                                                                                echo $_COOKIE["username"];
                                                                                            } ?>"><br>
                <label for="pass">Password:</label>
                <input id="pass" class="form-control" type="password" name="password"> <br>
                <button class="btn btn-primary">Prisijungti</button>
            </form>
        </div>
    </div>
</body>

</html>