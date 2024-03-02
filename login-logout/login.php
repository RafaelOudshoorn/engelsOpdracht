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
                echo "username and password are CORRECT!!";
                session_start();
                $_SESSION["user"] = $user->user_name;
                header("location:loggedin/index.php?id=$user->id");
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