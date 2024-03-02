<?php
    error_reporting(E_ERROR | E_PARSE);
    $query = "SELECT DISTINCT user_id, ";
    $query .= "(SELECT user_name FROM users WHERE users.id = answers.user_id) as user_name, ";
    $query .= "max(grade) as grade, ";
    $query .= "date_of_test ";
    $query .= "FROM answers GROUP BY user_id ORDER BY grade desc ";

    $stmt=$con->prepare($query);
    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_OBJ);

    $ids_num = 1;
    $ids_array = array();
    $user_names_array = array();
    $date_of_test_array = array();
    foreach ($rows as $row)
    {
        $ids_num_string = strval($ids_num);
        $ids_array[$ids_num_string] = $row->grade;

        $user_names_string = strval($ids_num);
        $user_names_array[$user_names_string] = $row->user_name;

        $date_of_test_string = strval($ids_num);
        $date_of_test_array[$date_of_test_string] = $row->date_of_test;

        $ids_num++;
    }
?>
        <br>
        <div class="LoggedinContainer">
            <div class="inner_LoggedinContainer container">
                <p>Scoreboard <span>Top 10</span></p>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Grade</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            for($top = 1;$top <= 10; $top ++){
                                if ($_SESSION["user"] != $user_names_array[$top]){
                                    echo "<tr>";
                                        echo "<td>$top</td>";
                                        echo "<td>" . $user_names_array[$top] . "</td>";
                                        echo "<td>" . $ids_array[$top] . "</td>";
                                        echo "<td>" . $date_of_test_array[$top] . "</td>";
                                    echo "</tr>";
                                }
                                else{
                                    echo "<tr style=\"font-weight: bold;\">";
                                        echo "<td>$top</td>";
                                        echo "<td>" . $user_names_array[$top] . "</td>";
                                        echo "<td>" . $ids_array[$top] . "</td>";
                                        echo "<td>" . $date_of_test_array[$top] . "</td>";
                                    echo "</tr>";
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>