<?php
    require_once "database/database.php";
    error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Engels - Resister</title>
        <link rel="icon" type="image/png" href="spons.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        </script>
    </head>
    <body>
        <h1 style="color: white;">REGISTREREN</h1>
        <div class="divv">
            <div class="container main_loginDiv">
                <div class="inner_loginDiv justify-content-center">
                    <form method="POST" class="form_login">
                        <?php
                            if($_POST){
                                $user_name = strval(htmlspecialchars($_POST["user_name"]));
                                $password = htmlspecialchars($_POST["user_password"]);
                                $user_password = password_hash($password, PASSWORD_DEFAULT);
                                $lower_caseUsername = strtolower($user_name);

                                $query = "SELECT * ";
                                $query .= "FROM users ";
                                $query .= "WHERE user_name = ? ";
                        
                                $stmt=$con->prepare($query);
                                $stmt->bindParam(1,$user_name);
                                $stmt->execute();
                        
                                $user = $stmt->fetchObject();

                                if($user_name !== $user->user_name){
                                    $query = "INSERT INTO ";
                                    $query .= "users (user_name, password) ";
                                    $query .= "VALUES (?,?) ";
                            
                                    $stmt=$con->prepare($query);
                                    $stmt->bindParam(1, $user_name);
                                    $stmt->bindParam(2, $user_password);
                                    $stmt->execute();
                                    
                                    echo "<script type=\"javascript\">if (confirm(\"User name = $user_name. Prosseed to login.\")) window.location = \"index.php\";</script>";
                                }
                                else{
                                    echo "<strong style=\"color:red;\">Change username.</strong>";
                                }
                            }
                            else{
                                echo "<strong style=\"color:red;\">Grow up.</strong>";
                            }
                        ?>
                        <input type="text" required name="user_name" maxlength="15" id="input_userName" class="input" placeholder="username">
                    <br><br>
                        <input type="password" required name="user_password" maxlength="15" id="input_Password" class="input" placeholder="password">
                    <br><br><br>
                        <button type="submit" class="btn btn-dark login_knop">Registreer</button>
                    </form>
                    <a href="index.php"><button type="button" class="btn btn-dark login_knop" style="margin-top: 16px;">Login</button></a>
                </div>
            </div>
        </div>
    </body>
</html>