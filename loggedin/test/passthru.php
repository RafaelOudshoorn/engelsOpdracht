<?php
    require_once "../../database/database.php";

    session_start();
    $user_name = $_SESSION["user"];
    if($user_name === null){
        header("location:../index.php");
    }
    if($_GET["id"] === null){
        header("location:../index.php");
    }

    $query = "select * from questions order by rand() limit 10;";

    $stmt=$con->prepare($query);
    $stmt->execute();

    $questions = $stmt->fetchAll(PDO::FETCH_OBJ);

    $question_num_php = 1;
    $question_array = array();
    foreach ($questions as $question)
    {
        $question_num_php_string = strval($question_num_php);
        $question_array[$question_num_php_string] = $question->question;
        $question_num_php++;
    }
    $_SESSION["question_array"] = $question_array;

    $query = "SELECT * ";
    $query .= "FROM users ";
    $query .= "WHERE user_name = ? ";

    $stmt=$con->prepare($query);
    $stmt->bindParam(1,$user_name);
    $stmt->execute();

    $user = $stmt->fetchObject();
    $user_id = $user->id;

    $query = "SELECT id_test ";
    $query .= "FROM answers ";
    $query .= "WHERE user_id = ? ";
    $query .= "ORDER BY id_test desc ";

    $stmt=$con->prepare($query);
    $stmt->bindParam(1,$user_id);
    $stmt->execute();

    $answers = $stmt->fetchObject();

    $test_id = $answers->id_test;
    $test_id ++;
    $_SESSION["test_id"] = $test_id;

    
    if($_SESSION["test"] === "idle"){
        $_SESSION["test"] = "started";
        header("location:index.php?id=$user_id");
    }
    elseif($_SESSION["test"] === "started"){
        header("location:index.php?id=$user_id");
    }
    elseif($_SESSION["test"] === "finished"){
        header("location:../index.php");
    }
    else{
        header("location:../index.php");
    }
?>