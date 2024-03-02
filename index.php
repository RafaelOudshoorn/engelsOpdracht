<?php
    error_reporting(E_ERROR | E_PARSE);
    require "database/database.php";

    session_start();
    if($_SESSION["user"] != null){
        $query = "SELECT * ";
        $query .= "FROM users ";
        $query .= "WHERE user_name = ? ";
        $query .= "ORDER BY id ASC ";

        $stmt=$con->prepare($query);
        $stmt->bindParam(1,$_SESSION["user"]);
        $stmt->execute();

        $user = $stmt->fetchObject();

        header("location:loggedin/index.php?id=$user->id");
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Engels - Login</title>
        <link rel="icon" type="image/png" href="spons.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1 style="color: white;">INLOG</h1>
        <div class="divv">
            <div class="container main_loginDiv">
                <div class="inner_loginDiv justify-content-center">
                    <form method="POST" class="form_login">
                        <?php
                            require "login-logout/login.php";
                        ?>
                        <input type="text" required name="user_name" class="input" placeholder="username">
                    <br><br>        
                        <input type="password" required name="user_password" class="input" placeholder="password">
                    <br><br><br>
                        <button type="submit" class="btn btn-dark login_knop">Login</button>
                    </form>
                    <a href="regist.php"><button type="button" class="btn btn-dark login_knop" style="margin-top: 16px;">Registreren</button></a>
                </div>
            </div>
        </div>
    </body>
</html>