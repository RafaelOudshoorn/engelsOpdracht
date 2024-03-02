<?php
    require "../database/database.php";

    session_start();
    $user_name = $_SESSION["user"];
    if($user_name != "guest"){
        sleep(2);
        header("location:../index.php");
        exit();
    }

    $query = "SELECT * ";
    $query .= "FROM users ";
    $query .= "WHERE user_name = ? ";
    $query .= "ORDER BY id ASC ";

    $stmt=$con->prepare($query);
    $stmt->bindParam(1,$user_name);
    $stmt->execute();

    $user = $stmt->fetchObject();

    $userId = $user->id;
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Engels - Admin</title>
        <link rel="icon" type="image/png" href="../spons.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <div class="header" id="home">
            <div class="inner_header">
                <div class="logo_container">
                    <?php
                        echo "<a href=\"loggedin.php?admin=true&id=$userId\">";
                            echo "<h1>Eng<span>els</span> Admin page</h1>";
                        echo "</a>";
                    ?>
                </div>
                <ul class="navigation" id="navLinks">
                    <a><li>Welcome <?php echo $_SESSION["user"]; ?></li></a>
                    <a href="#" onclick="logout()"><li>Logout</li></a>
                    <script type="javascript">function logout(){if (confirm("Logout?")) window.location.href = '../login-logout/logout.php';}</script>
                </ul>
            </div>
        </div>
        <br>