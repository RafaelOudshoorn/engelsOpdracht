<?php
    require_once "../database/database.php";
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
        <h1>ADMIN LOGIN PAGE</h1>
        <div class="divv">
            <div class="container main_loginDiv">
                <div class="inner_loginDiv justify-content-center">
                    <form method="POST" class="form_login">
                    <h1>ADMIN LOGIN</h1>
                        <?php
                            if($_POST){
                                $query = "SELECT * ";
                                $query .= "FROM users ";
                                $query .= "WHERE user_name = ? ";
                                $query .= "ORDER BY id ASC ";
                        
                                $stmt=$con->prepare($query);
                                $stmt->bindParam(1,$_POST["user_name"]);
                                $stmt->execute();
                        
                                $user = $stmt->fetchObject();
                        
                                if($user !== false){
                                    if(password_verify( $_POST["user_password"] , $user->password)){
                                        if($user->id === 1){
                                            echo "username and password are CORRECT!!";
                                            session_start();
                                            $_SESSION["user"] = $user->user_name;
                                            header("location:loggedin.php?admin=true&id=$user->id");
                                        }
                                        echo "<strong style=\"color:red;\">you are no adminastrator of this website</strong>";
                                    }
                                    else{
                                        echo "<strong style=\"color:red;\">password is incorrect</strong>";
                                    }
                                }
                                else{
                                    echo "<strong style=\"color:red;\">username or password are incorrect</strong>";
                                }
                            }
                        ?>
                        <input type="text" required name="user_name" class="input" placeholder="username">
                    <br><br>        
                        <input type="password" required name="user_password" class="input" placeholder="password">
                    <br><br><br>
                        <button type="submit" class="btn btn-dark login_knop">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>