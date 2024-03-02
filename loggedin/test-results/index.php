<?php
    $path = "../..";
    $path_portfolio = "..";
    include "../header-footer/header.php";

    if($_SESSION["test"] === "idle"){
        if($_SESSION["test_id"] === null){
            echo "<br>";
            echo "<div class=\"LoggedinContainer\">";
                echo "<div class=\"inner_LoggedinContainer\">";
                    echo "<p><span>You have not done a test yet. </span>Go back to start a test.</p>";
                echo "</div>";
            echo "</div>";
        }
        else{
            include "finished.php";
            $num_of_tests = intval($_SESSION["test_id"]);
            $num_of_tests --;
            // echo $num_of_tests;
            for($num_of_tests; $num_of_tests > 0; $num_of_tests --){
                include "other_results.php";
            }
        }
    }
    elseif($_SESSION["test"] === "finished"){
        include "finished.php";
    }
    elseif($_SESSION["test"] === "started"){
        header("location:../index.php");
    }
    else{
        header("location:../index.php");
    }

?>

<?php
    include "../header-footer/footer.php";
?>