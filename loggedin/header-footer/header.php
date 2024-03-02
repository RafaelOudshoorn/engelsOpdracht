<?php
    require_once "$path/database/database.php";

    session_start();
    $user_name = $_SESSION["user"];
    if($user_name === null){
        header("location:$path/index.php");
    }
    if($_GET["id"] === null){
        header("location:$path/index.php");
    }

    $query = "SELECT * ";
    $query .= "FROM users ";
    $query .= "WHERE user_name = ? ";
    $query .= "ORDER BY id ASC ";

    $stmt=$con->prepare($query);
    $stmt->bindParam(1,$user_name);
    $stmt->execute();

    $user = $stmt->fetchObject();
    $user_id = $user->id;

?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php
        echo "<title>Engels - ingeloged</title>";
        echo "<link rel=\"icon\" type=\"image/png\" href=\"$path/spons.png\">";
        echo "<script src=\"https://code.jquery.com/jquery-3.6.0.min.js\" integrity=\"sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=\" crossorigin=\"anonymous\"></script>";
        echo "<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css\" integrity=\"sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3\" crossorigin=\"anonymous\">";
        echo "<link href=\"https://fonts.googleapis.com/css2?family=Montserrat\" rel=\"stylesheet\">";
        echo "<link rel=\"stylesheet\" href=\"$path/style.css\">";
        ?>
    </head>
    <body>
        <div class="header" id="home">
            <div class="inner_header">
                <div class="logo_container">
                    <?php
                        echo "<a href=\"$path/index.php?id=$user_id\">";
                            echo "<h1>Eng<span>els</span></h1>";
                        echo "</a>";
                    ?>
                </div>
                <ul class="navigation" id="navLinks">
                    <?php
                    echo "<a><li>Welcome $user_name</li></a>";
                    echo "<a href=\"#\" onclick=\"logout()\"><li>Logout</li></a><script type=\"text/javascript\">function logout(){if (confirm(\"Logout?\")) window.location.href = '$path/login-logout/logout.php';}</script>";
                    ?>
                </ul>
            </div>
        </div>