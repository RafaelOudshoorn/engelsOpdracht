<?php
    $query = "SELECT ";
    $query .= "id_answers, ";
    $query .= "id_test, ";
    $query .= "id_questions, ";
    $query .= "(SELECT answer FROM questions WHERE questions.id_questions = answers.id_questions) AS answers, ";
    $query .= "user_id, ";
    $query .= "user_answers, ";
    $query .= "questions, ";
    $query .= "date_of_test ";
    $query .= "FROM answers ";
    $query .= "WHERE id_test = ? ";
    $query .= "AND user_id = ? ";
    $query .= "ORDER BY id_answers ASC ";

    $stmt=$con->prepare($query);
    $stmt->bindValue(1, $_SESSION["test_id"]);
    $stmt->bindValue(2, $user_id);
    $stmt->execute();

    $answers = $stmt->fetchAll(PDO::FETCH_OBJ);

    // echo $answers->date_of_test;

    $question_num = 1;
    $question_array = array();
    foreach ($answers as $question)
    {
        $question_num_string = strval($question_num);
        $question_array[$question_num_string] = $question->questions;
        $question_num++;
    }
    $question_answer_num = 1;
    $question_answer_array = array();
    foreach ($answers as $question_answer)
    {
        $question_answer_num_string = strval($question_answer_num);
        $question_answer_array[$question_answer_num_string] = $question_answer->answers;
        $question_answer_num++;
    }
    $userAnswer_num = 1;
    $userAnswer_array = array();
    foreach ($answers as $userAnswer)
    {
        $userAnswer_num_string = strval($userAnswer_num);
        $userAnswer_array[$userAnswer_num_string] = $userAnswer->user_answers;
        $userAnswer_num++;
    }
    include "grade.php";
?>