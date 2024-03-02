<?php
    include "loadQuestions.php";
?>
        <br>
        <div class="LoggedinContainer">
            <div class="inner_LoggedinContainer container">
                <p>Question: <span id="question_num">Start test</span></p>
                <form autocomplete="off" id="form_questions" method="post" action="results.php?id=<?php echo $user->id; ?>">
                    <p id="question" class="text-center">
                    <?php
                        echo "<span id=\"test1\" style=\"display:none;\">" . $question1 . "</span>";
                        echo "<span id=\"test2\" style=\"display:none;\">" . $question2 . "</span>";
                        echo "<span id=\"test3\" style=\"display:none;\">" . $question3 . "</span>";
                        echo "<span id=\"test4\" style=\"display:none;\">" . $question4 . "</span>";
                        echo "<span id=\"test5\" style=\"display:none;\">" . $question5 . "</span>";
                        echo "<span id=\"test6\" style=\"display:none;\">" . $question6 . "</span>";
                        echo "<span id=\"test7\" style=\"display:none;\">" . $question7 . "</span>";
                        echo "<span id=\"test8\" style=\"display:none;\">" . $question8 . "</span>";
                        echo "<span id=\"test9\" style=\"display:none;\">" . $question9 . "</span>";
                        echo "<span id=\"test10\" style=\"display:none;\">" . $question10 . "</span>";
                    ?>
                    </p>
                    <div id="btn_div">
                        <button type="button" class="btn" id="previous_btn" style="display:none;">Previous</button>
                        <button type="button" class="btn" id="next_btn">Start</button>
                        <br>
                    </div>
                </form>
                <br>
            </div>
        </div>