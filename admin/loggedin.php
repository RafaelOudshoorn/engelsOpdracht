<?php
    include "header-footer/header.php";
    include "user_list.php";
?>
        <div class="adminLoggedinContainer">
            <div class="inner_adminLoggedinContainer">
                <?php
                    echo "<a href=\"addQuestion.php?admin=true&id=$userId\" class=\"textDarkColor\" style=\"font-size: 16px;\">Vraag toevoegen</a>";
                ?>
             </div>
        </div>
<?php
    include "header-footer/footer.php";
?>