        <div class="adminUserlistContainer">
            <div class="inner_adminUserlistContainer">
                <table class="table">
                    <?php
                        $query = "SELECT * ";
                        $query .= "FROM users ";
                        $query .= "ORDER BY id ASC ";
                    
                        $stmt=$con->prepare($query);
                        $stmt->execute();
                    
                        $user = $stmt->fetchAll(PDO::FETCH_OBJ);
                    ?>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">user_name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($user as $users){
                                echo "<tr>";
                                echo "<td>$users->id</td>";
                                echo "<td>$users->user_name</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>