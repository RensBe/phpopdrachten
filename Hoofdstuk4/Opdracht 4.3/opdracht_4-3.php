<?php
//includes van de pagina
include "../../includes/header.php";
include "../../includes/menu.php";
include "script.php";
?>
    <main id="wrapper">
        <h2>Uitwerkingen</h2>
        <?php
//        laad alle tasks in met regels ertussen zodat ze duidelijk individueel zichtbaar zijn.
        echo $task2."<br>".$task3."<br>".$task4."<br>".$task5."<br>".$task6."<br>".$task7;
        ?>
    </main>
<?php
include "../../includes/footer.php";
?>