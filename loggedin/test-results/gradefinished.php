<?php
    $good_answer = 0;
    $wrong_answer = 0;
    $userAnswer_true_false = array();
    for($g = 1; $g <= 10; $g ++){
        if($userAnswer_array[$g] === $question_answer_array[$g]){
            $userAnswer_true_false[$g] = "<td style=\"color:green;\">";
            $good_answer ++;
        }
        else{
            $userAnswer_true_false[$g] = "<td style=\"color:red;\">";
            $wrong_answer ++;
        }
    }
    $answer_num = $good_answer;
    if($good_answer > 5){
        $grade = "<span style=\"color: green;\">$good_answer</span>";
    }
    else{
        $grade = "<span style=\"color: red;\">$good_answer</span>";
    }
    if($good_answer === 0){
        $answer_num = 1;
        $grade = 1;
        $grade = "<span style=\"color: red;\">1 for effort</span>";
    }

    $query = "UPDATE answers ";
    $query .= "SET grade = ? ";
    $query .= "WHERE id_test = ? ";
    $query .= "AND user_id = ? ";

    $stmt=$con->prepare($query);
    $stmt->bindValue(1, $answer_num);
    $stmt->bindValue(2, $_SESSION["test_id"]);
    $stmt->bindValue(3, $user_id);
    $stmt->execute();
?>