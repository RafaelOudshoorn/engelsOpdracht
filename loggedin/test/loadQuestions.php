<?php
    $question1 = str_replace("....", "<input required autocomplete=\"off\" type=\"text\" class=\"input\" name=\"vraag1\" style=\"width: 100px;\" maxlength=\"15\" placeholder=\"....\"></input>", $_SESSION["question_array"]['1']);
    $question2 = str_replace("....", "<input required autocomplete=\"off\" type=\"text\" class=\"input\" name=\"vraag2\" style=\"width: 100px;\" maxlength=\"15\" placeholder=\"....\"></input>", $_SESSION["question_array"]['2']);
    $question3 = str_replace("....", "<input required autocomplete=\"off\" type=\"text\" class=\"input\" name=\"vraag3\" style=\"width: 100px;\" maxlength=\"15\" placeholder=\"....\"></input>", $_SESSION["question_array"]['3']);
    $question4 = str_replace("....", "<input required autocomplete=\"off\" type=\"text\" class=\"input\" name=\"vraag4\" style=\"width: 100px;\" maxlength=\"15\" placeholder=\"....\"></input>", $_SESSION["question_array"]['4']);
    $question5 = str_replace("....", "<input required autocomplete=\"off\" type=\"text\" class=\"input\" name=\"vraag5\" style=\"width: 100px;\" maxlength=\"15\" placeholder=\"....\"></input>", $_SESSION["question_array"]['5']);
    $question6 = str_replace("....", "<input required autocomplete=\"off\" type=\"text\" class=\"input\" name=\"vraag6\" style=\"width: 100px;\" maxlength=\"15\" placeholder=\"....\"></input>", $_SESSION["question_array"]['6']);
    $question7 = str_replace("....", "<input required autocomplete=\"off\" type=\"text\" class=\"input\" name=\"vraag7\" style=\"width: 100px;\" maxlength=\"15\" placeholder=\"....\"></input>", $_SESSION["question_array"]['7']);
    $question8 = str_replace("....", "<input required autocomplete=\"off\" type=\"text\" class=\"input\" name=\"vraag8\" style=\"width: 100px;\" maxlength=\"15\" placeholder=\"....\"></input>", $_SESSION["question_array"]['8']);
    $question9 = str_replace("....", "<input required autocomplete=\"off\" type=\"text\" class=\"input\" name=\"vraag9\" style=\"width: 100px;\" maxlength=\"15\" placeholder=\"....\"></input>", $_SESSION["question_array"]['9']);
    $question10 = str_replace("....", "<input required autocomplete=\"off\" type=\"text\" class=\"input\" name=\"vraag10\" style=\"width: 100px;\" maxlength=\"15\" placeholder=\"....\"></input>", $_SESSION["question_array"]['10']);
?>
<script>
    $(document).ready(function(){
        var question_num_java = 0;
        var question = document.getElementById("question_num");
        <?php
            echo "window.history.pushState(null, \"\", \"?id=$user->id\");";
        ?>
        
        $("#previous_btn").click(function(){
            question_num_java --;
            if(question_num_java <= 9){
                $("#question_num").text(question_num_java.toString() + "/10");
            }
            <?php
                echo "window.history.pushState(null, \"\", \"?id=$user->id&question=\" + question_num_java + \"\");";
            ?>
            switch(question_num_java){
                case 0:
                    question_num_java = 1;
                break;
                case 1:
                $("#previous_btn").css("display","none");
                $("#test1").css("display","block");
                $("#test2").css("display","none");
                break;
                case 2:
                $("#test2").css("display","block");
                $("#test3").css("display","none");
                break;
                case 3:
                $("#test3").css("display","block");
                $("#test4").css("display","none");
                break;
                case 4:
                $("#test4").css("display","block");
                $("#test5").css("display","none");
                break;
                case 5:
                $("#test5").css("display","block");
                $("#test6").css("display","none");
                break;
                case 6:
                $("#test6").css("display","block");
                $("#test7").css("display","none");
                break;
                case 7:
                $("#test7").css("display","block");
                $("#test8").css("display","none");
                break;
                case 8:
                $("#test8").css("display","block");
                $("#test9").css("display","none");
                break;
                case 9:
                $("#next_btn").text("Next");
                $("#test9").css("display","block");
                $("#test10").css("display","none");
                break;
                case 10:
                $("#test9").css("display","none");
            }
        });
        $("#next_btn").click(function(event){
            event.preventDefault();
            $("#previous_btn").css("display","block");
            $("#next_btn").text("Next");
            question_num_java ++;
            if(question_num_java <= 9){
                $("#question_num").text(question_num_java.toString() + "/10");
            } 
            if(question_num_java === 10){
                $("#question_num").text(question_num_java.toString() + "/10 last question");
            }
            if(question_num_java > 10){
                question_num_java = 0;
            }
            <?php
                echo "window.history.pushState(null, \"\", \"?id=$user->id&question=\" + question_num_java + \"\");";
            ?>
            switch(question_num_java){
                case 0:
                $("#question_num").text("Fetching Results");
                $("#previous_btn").css("display","none");
                $("#next_btn").css("display","none");
                $("#test10").css("display","none");
                $("#form_questions").submit();
                break;
                case 1:
                $("#previous_btn").css("display","none");
                $("#test1").css("display","block");
                break;
                case 2:
                $("#test1").css("display","none");
                $("#test2").css("display","block");
                break;
                case 3:
                $("#test2").css("display","none");
                $("#test3").css("display","block");
                break;
                case 4:
                $("#test3").css("display","none");
                $("#test4").css("display","block");
                break;
                case 5:
                $("#test4").css("display","none");
                $("#test5").css("display","block");
                break;
                case 6:
                $("#test5").css("display","none");
                $("#test6").css("display","block");
                break;
                case 7:
                $("#test6").css("display","none");
                $("#test7").css("display","block");
                break;
                case 8:
                $("#test7").css("display","none");
                $("#test8").css("display","block");
                break;
                case 9:
                $("#test8").css("display","none");
                $("#test9").css("display","block");
                break;
                case 10:
                $("#test9").css("display","none");
                $("#test10").css("display","block");
                $("#next_btn").text("Finish Test");
            }
        });
        $("#question").text();
    });
</script>