<?php
//includes van de pagina
include "../../includes/header.php";
include "../../includes/menu.php";
?>
    <main id="wrapper">
        <h2>Uitwerkingen</h2>
        <?php
//            $counter = 0;
//            while($counter <= 10)
//            {
//                $counter ++;
//                $text = "hoi".$counter."<br>";
//                $text = $text."hoi".$counter;
//            }
            for($teller = 0; $teller <= 10; $teller++)
            {
                echo "wat".$teller;
            }
        ?>
    </main>
<?php
include "../../includes/footer.php";
?>