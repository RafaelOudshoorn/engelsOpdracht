<?php
    $path = "../..";
    include "../header-footer/header.php";
    if($_SESSION["test"] === "idle"){
        $_SESSION["test"] = "started";
        header("location:$path/index.php?id=$user->id");
    }
    elseif($_SESSION["test"] === "started"){
    }
    elseif($_SESSION["test"] === "finished"){
        header("location:../index.php");
    }
    else{
        header("location:../index.php");
    }
    include "questions.php";
?>

<?php
    include "../header-footer/footer.php";
?>