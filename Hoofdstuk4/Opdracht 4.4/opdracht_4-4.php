<?php
//includes van de pagina
include "../../includes/header.php";
include "../../includes/menu.php";
?>
    <main id="wrapper">
        <h2>Uitwerkingen</h2>
        <?php
        for($i = 0; $i <= 7; $i++) {
            $adder = strtotime("+".$i . "days");
            $day = date('w', $adder);
            $fullday = date('l d-n-Y', $adder);
            echo "Dag " . $day . " is " . $fullday.'<br>';
        }
        $over = "";
        echo "<br><br>";
        For($i = 0; $i <= 7; $i++)
        {
            if($i == 0)
            {
                $day = "Vandaag";
            }
            else
            {
                $day = "Morgen";
            }
            $adder = strtotime("now +" . $i . "days");
            $fullday = date('l d-n-Y', $adder);
            While ($i >= 2)
            {
                $over = $over."Over-";
                break;
            }
            echo $over.$day . " is " . $fullday.'<br>';
        }
        ?>
    </main>
<?php
include "../../includes/footer.php";
?>