<!--
* User: Rens Bedijn
* Date: 5-2-2020
* Time: 13:43 PM
* File: index.php
-->
<?php
include "variabelen.php"
?>
<footer>
    <?php
    echo $name . ", " . $klas . ", " . $year . " ";
    $uur = date("H");
    date_default_timezone_set("Europe/Amsterdam");
    if($uur >= 0 && $uur < 5)
    {
        echo "Goedennacht";
    }
    else if ($uur >= 5 && $uur < 12)
    {
        echo "Goedenochtend";
    }
    else if ($uur >= 12 && $uur < 17)
    {
        echo "Goedenmiddag";
    }
    else
    {
        echo "Goedenavond";
    }
    ?>
</footer>
</body>
</html>