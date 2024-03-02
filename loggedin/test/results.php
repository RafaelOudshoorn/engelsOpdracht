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

    $pattrn = array('(','#','$',')','.','"','\'',';');

    if($_POST["vraag1"] != null){
        $answer1 = strval(strtolower(htmlspecialchars(str_replace($pattrn, "", $_POST["vraag1"]))));
    }
    else{
        $answer1 = "no_input";
    }
    if($_POST["vraag2"] != null){
        $answer2 = strval(strtolower(htmlspecialchars(str_replace($pattrn, "", $_POST["vraag2"]))));
    }
    else{
        $answer2 = "no_input";
    }
    if($_POST["vraag3"] != null){
        $answer3 = strval(strtolower(htmlspecialchars(str_replace($pattrn, "", $_POST["vraag3"]))));
    }
    else{
        $answer3 = "no_input";
    }
    if($_POST["vraag4"] != null){
        $answer4 = strval(strtolower(htmlspecialchars(str_replace($pattrn, "", $_POST["vraag4"]))));
    }
    else{
        $answer4 = "no_input";
    }
    if($_POST["vraag5"] != null){
        $answer5 = strval(strtolower(htmlspecialchars(str_replace($pattrn, "", $_POST["vraag5"]))));
    }
    else{
        $answer5 = "no_input";
    }
    if($_POST["vraag6"] != null){
        $answer6 = strval(strtolower(htmlspecialchars(str_replace($pattrn, "", $_POST["vraag6"]))));
    }
    else{
        $answer6 = "no_input";
    }
    if($_POST["vraag7"] != null){
        $answer7 = strval(strtolower(htmlspecialchars(str_replace($pattrn, "", $_POST["vraag7"]))));
    }
    else{
        $answer7 = "no_input";
    }
    if($_POST["vraag8"] != null){
        $answer8 = strval(strtolower(htmlspecialchars(str_replace($pattrn, "", $_POST["vraag8"]))));
    }
    else{
        $answer8 = "no_input";
    }
    if($_POST["vraag9"] != null){
        $answer9 = strval(strtolower(htmlspecialchars(str_replace($pattrn, "", $_POST["vraag9"]))));
    }
    else{
        $answer9 = "no_input";
    }
    if($_POST["vraag10"] != null){
        $answer10 = strval(strtolower(htmlspecialchars(str_replace($pattrn, "", $_POST["vraag10"]))));
    }
    else{
        $answer10 = "no_input";
    }

    $query = "SELECT * ";
    $query .= "FROM questions ";
    $query .= "WHERE question = ? ";

    $stmt=$con->prepare($query);
    $stmt->bindParam(1,$_SESSION["question_array"]["1"]);
    $stmt->execute();
    $questions = $stmt->fetchObject();
    $question_id1 = $questions->id_questions;
    $stmt=$con->prepare($query);
    $stmt->bindParam(1,$_SESSION["question_array"]["2"]);
    $stmt->execute();
    $questions = $stmt->fetchObject();
    $question_id2 = $questions->id_questions;
    $stmt=$con->prepare($query);
    $stmt->bindParam(1,$_SESSION["question_array"]["3"]);
    $stmt->execute();
    $questions = $stmt->fetchObject();
    $question_id3 = $questions->id_questions;
    $stmt=$con->prepare($query);
    $stmt->bindParam(1,$_SESSION["question_array"]["4"]);
    $stmt->execute();
    $questions = $stmt->fetchObject();
    $question_id4 = $questions->id_questions;
    $stmt=$con->prepare($query);
    $stmt->bindParam(1,$_SESSION["question_array"]["5"]);
    $stmt->execute();
    $questions = $stmt->fetchObject();
    $question_id5 = $questions->id_questions;
    $stmt=$con->prepare($query);
    $stmt->bindParam(1,$_SESSION["question_array"]["6"]);
    $stmt->execute();
    $questions = $stmt->fetchObject();
    $question_id6 = $questions->id_questions;
    $stmt=$con->prepare($query);
    $stmt->bindParam(1,$_SESSION["question_array"]["7"]);
    $stmt->execute();
    $questions = $stmt->fetchObject();
    $question_id7 = $questions->id_questions;
    $stmt=$con->prepare($query);
    $stmt->bindParam(1,$_SESSION["question_array"]["8"]);
    $stmt->execute();
    $questions = $stmt->fetchObject();
    $question_id8 = $questions->id_questions;
    $stmt=$con->prepare($query);
    $stmt->bindParam(1,$_SESSION["question_array"]["9"]);
    $stmt->execute();
    $questions = $stmt->fetchObject();
    $question_id9 = $questions->id_questions;
    $stmt=$con->prepare($query);
    $stmt->bindParam(1,$_SESSION["question_array"]["10"]);
    $stmt->execute();
    $questions = $stmt->fetchObject();
    $question_id10 = $questions->id_questions;

    $test_id = $_SESSION["test_id"];
    $date_of_test = strval(date("d-m-Y"));
    
    $query = "INSERT INTO ";
    $query .= "answers (id_test, id_questions, user_id, user_answers, questions, date_of_test) ";
    $query .= "VALUES (?, ?, ?, ?, ?, ?) ";

    $stmt=$con->prepare($query);
    $stmt->bindValue(1, $test_id);
    $stmt->bindValue(2, $question_id1);
    $stmt->bindValue(3, $user_id);
    $stmt->bindValue(4, $answer1);
    $stmt->bindValue(5, $_SESSION["question_array"]["1"]);
    $stmt->bindValue(6, $date_of_test);
    $stmt->execute();
    $stmt=$con->prepare($query);
    $stmt->bindValue(1, $test_id);
    $stmt->bindValue(2, $question_id2);
    $stmt->bindValue(3, $user_id);
    $stmt->bindValue(4, $answer2);
    $stmt->bindValue(5, $_SESSION["question_array"]["2"]);
    $stmt->bindValue(6, $date_of_test);
    $stmt->execute();
    $stmt=$con->prepare($query);
    $stmt->bindValue(1, $test_id);
    $stmt->bindValue(2, $question_id3);
    $stmt->bindValue(3, $user_id);
    $stmt->bindValue(4, $answer3);
    $stmt->bindValue(5, $_SESSION["question_array"]["3"]);
    $stmt->bindValue(6, $date_of_test);
    $stmt->execute();
    $stmt=$con->prepare($query);
    $stmt->bindValue(1, $test_id);
    $stmt->bindValue(2, $question_id4);
    $stmt->bindValue(3, $user_id);
    $stmt->bindValue(4, $answer4);
    $stmt->bindValue(5, $_SESSION["question_array"]["4"]);
    $stmt->bindValue(6, $date_of_test);
    $stmt->execute();
    $stmt=$con->prepare($query);
    $stmt->bindValue(1, $test_id);
    $stmt->bindValue(2, $question_id5);
    $stmt->bindValue(3, $user_id);
    $stmt->bindValue(4, $answer5);
    $stmt->bindValue(5, $_SESSION["question_array"]["5"]);
    $stmt->bindValue(6, $date_of_test);
    $stmt->execute();
    $stmt=$con->prepare($query);
    $stmt->bindValue(1, $test_id);
    $stmt->bindValue(2, $question_id6);
    $stmt->bindValue(3, $user_id);
    $stmt->bindValue(4, $answer6);
    $stmt->bindValue(5, $_SESSION["question_array"]["6"]);
    $stmt->bindValue(6, $date_of_test);
    $stmt->execute();
    $stmt=$con->prepare($query);
    $stmt->bindValue(1, $test_id);
    $stmt->bindValue(2, $question_id7);
    $stmt->bindValue(3, $user_id);
    $stmt->bindValue(4, $answer7);
    $stmt->bindValue(5, $_SESSION["question_array"]["7"]);
    $stmt->bindValue(6, $date_of_test);
    $stmt->execute();
    $stmt=$con->prepare($query);
    $stmt->bindValue(1, $test_id);
    $stmt->bindValue(2, $question_id8);
    $stmt->bindValue(3, $user_id);
    $stmt->bindValue(4, $answer8);
    $stmt->bindValue(5, $_SESSION["question_array"]["8"]);
    $stmt->bindValue(6, $date_of_test);
    $stmt->execute();
    $stmt=$con->prepare($query);
    $stmt->bindValue(1, $test_id);
    $stmt->bindValue(2, $question_id9);
    $stmt->bindValue(3, $user_id);
    $stmt->bindValue(4, $answer9);
    $stmt->bindValue(5, $_SESSION["question_array"]["9"]);
    $stmt->bindValue(6, $date_of_test);
    $stmt->execute();
    $stmt=$con->prepare($query);
    $stmt->bindValue(1, $test_id);
    $stmt->bindValue(2, $question_id10);
    $stmt->bindValue(3, $user_id);
    $stmt->bindValue(4, $answer10);
    $stmt->bindValue(5, $_SESSION["question_array"]["10"]);
    $stmt->bindValue(6, $date_of_test);
    $stmt->execute();

    // echo " " . $test_id . "<br>";
    // echo $question_id1 . " " . $_SESSION["question_array"]["1"] . " " . $answer1 . "<br>";
    // echo $question_id2 . " " . $_SESSION["question_array"]["2"] . " " . $answer2 . "<br>";
    // echo $question_id3 . " " . $_SESSION["question_array"]["3"] . " " . $answer3 . "<br>";
    // echo $question_id4 . " " . $_SESSION["question_array"]["4"] . " " . $answer4 . "<br>";
    // echo $question_id5 . " " . $_SESSION["question_array"]["5"] . " " . $answer5 . "<br>";
    // echo $question_id6 . " " . $_SESSION["question_array"]["6"] . " " . $answer6 . "<br>";
    // echo $question_id7 . " " . $_SESSION["question_array"]["7"] . " " . $answer7 . "<br>";
    // echo $question_id8 . " " . $_SESSION["question_array"]["8"] . " " . $answer8 . "<br>";
    // echo $question_id9 . " " . $_SESSION["question_array"]["9"] . " " . $answer9 . "<br>";
    // echo $question_id10 . " " . $_SESSION["question_array"]["10"] . " " . $answer10 . "<br>";

    $_SESSION["test"] = "finished";
    if($_SESSION["test"] === "idle"){
        $_SESSION["test"] = "finished";
        header("location:../index.php");
    }
    elseif($_SESSION["test"] === "finished"){
        sleep(1);
        header("location:../test-results/passthru?id=$user_id");
    }
    elseif($_SESSION["test"] === "started"){
        header("location:../index.php");
    }
    else{
        header("location:../index.php");
    }
?>