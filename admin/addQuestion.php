<?php
    include "header-footer/header.php";
    include "user_list.php";
    if($_POST){
        $query = "INSERT INTO ";
        $query .= "questions (question, answer) ";
        $query .= "VALUES (?, ?);";

        $stmt=$con->prepare($query);
        $stmt->bindParam(1,$_POST["question"]);
        $stmt->bindParam(2,$_POST["answer"]);
        $stmt->execute();

        header("location:addQuestion.php?admin=true&id=$userId");
    }

    $query = "SELECT * ";
    $query .= "FROM questions ";
    $query .= "ORDER BY id_questions ASC ";

    $stmt=$con->prepare($query);
    $stmt->execute();

    $questions = $stmt->fetchAll(PDO::FETCH_OBJ);
?>
        <div class="adminAddQuestionContainer">
            <div class="inner_adminAddQuestionContainer">
                <form method="POST" class="form_questions">
                    Waar het antwoord komt "...." typen!
                <br>
                    <input required type="text" name="question" class="input input_questions" placeholder="Question">
                <br><br>
                    <input required type="text" name="answer" class="input input_questions" placeholder="Answer">
                <br><br><br>
                    <button type="submit" class="btn btn-dark login_knop">Add Question</button>
                </form>
            </div>
        </div>
        <br><br>
        <div class="adminAddQuestionContainer">
            <div class="inner_adminAddQuestionContainer">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Question</th>
                            <th scope="col">Answer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($questions as $question){
                                echo "<tr>";
                                echo "<td>$question->id_questions</td>";
                                echo "<td>$question->question</td>";
                                echo "<td>$question->answer</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
<?php
    include "header-footer/footer.php";
?>