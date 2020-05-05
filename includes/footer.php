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
    session_start();
    if (isset($_SESSION['username'])) {
        $bezoeker = $_SESSION['username'] . "&nbsp;<a
href='../../../phpopdrachten/Hoofdstuk6/loguit.php'>Loguit</a>";
    } else {
        $bezoeker = "onbekende bezoeker" . "&nbsp;<a
href='../../../phpopdrachten/Hoofdstuk6/Opdracht%206.1/opdracht_6-1.php'>Login</a>";
    }
    if($uur >= 0 && $uur < 5)
    {
        echo "Goedennacht $bezoeker";
    }
    else if ($uur >= 5 && $uur < 12)
    {
        echo "Goedenochtend $bezoeker";
    }
    else if ($uur >= 12 && $uur < 17)
    {
        echo "Goedenmiddag $bezoeker";
    }
    else
    {
        echo "Goedenavond $bezoeker";
    }
    ?>
</footer>
</body>
</html>