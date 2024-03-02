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
    $_SESSION["test_id"] = $test_id;

    if($_SESSION["test"] === "idle"){
        header("location:index.php?id=$user_id");
    }
    elseif($_SESSION["test"] === "finished"){
        header("location:index.php?id=$user_id");
    }
    elseif($_SESSION["test"] === "started"){
        header("location:../index.php");
    }
    else{
        header("location:../index.php");
    }
?>