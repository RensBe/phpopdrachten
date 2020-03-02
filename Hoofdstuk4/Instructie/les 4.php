<?php
//includes van de pagina
include "../../includes/header.php";
include "../../includes/menu.php";
?>
    <main id="wrapper">
        <h2>Uitwerkingen</h2>
        <p>
            <?php
            date_default_timezone_set("US/Central");
            echo date("d-m-Y H:i");
            ?>
            <br>
            <?php
            $month = date("n");
            if($month == 3)
            {
                echo "Het is vandaag lente";
            }
            else if($month >= 6 && $month <= 9)
            {
                echo "Het is zomer";
            }
            ?>
        </p>
        </php>
    </main>
<?php
include "../../includes/footer.php";
?>