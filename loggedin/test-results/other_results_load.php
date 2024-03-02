<?php
    $num_of_tests = intval($_SESSION["test_id"]);
    $num_of_tests --;
    // echo $num_of_tests;
    for($num_of_tests; $num_of_tests > 0; $num_of_tests --){
        include "other_results.php";
    }
?>