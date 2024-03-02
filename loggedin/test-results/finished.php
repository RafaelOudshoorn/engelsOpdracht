<?php
    include "arraysfinished.php";

    $query = "SELECT * ";
    $query .= "FROM answers ";
    $query .= "WHERE id_test = ? ";
    $query .= "AND user_id = ? ";
    $query .= "ORDER BY id_answers ASC ";

    $stmt=$con->prepare($query);
    $stmt->bindValue(1, $_SESSION["test_id"]);
    $stmt->bindValue(2, $user_id);
    $stmt->execute();

    $answer_1 = $stmt->fetchAll(PDO::FETCH_OBJ);
    $answer_1_num = 1;
    $answer_1_array = array();
    foreach ($answer_1 as $answer)
    {
        $answer_1_num_string = strval($answer_1_num);
        $answer_1_array[$answer_1_num_string] = $answer->date_of_test;
        $answer_1_num++;
    }

?>
        <br>
        <div class="LoggedinContainer">
            <div class="inner_LoggedinContainer">
                <?php
                    echo "<p><span>Last test " . strval($answer_1_array["1"]) . "</span></p>";
                    // var_dump($question_array);
                    // var_dump($question_answer_array);
                    // var_dump($userAnswer_array);
                    // var_dump($userAnswer_true_false);
                    // var_dump($answer_1_array["1"]);
                ?>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">Your answer</th>
                            <th scope="col">Right answer</th>
                            <th scope="col">Question</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($answers as $question){
                                echo "<tr>";
                                echo $userAnswer_true_false[$i] . $userAnswer_array[$i] . "</td>";
                                echo "<td>" . $question_answer_array[$i] . "</td>";
                                echo "<td>" .$question_array[$i] . "</td>";
                                echo "<tr>";
                                $i ++;
                            }
                        ?>
                    </tbody>
                </table>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <?php
                                echo "<th scope=\"col\">Your grade: $grade</th>";
                                echo "<th scope=\"col\"><span style=\"color: green;\">$good_answer</span> good / <span style=\"color: red;\">$wrong_answer</span> wrong</th>";
                            ?>
                        </tr>
                    </thead>
                </table>
             </div>
        </div>