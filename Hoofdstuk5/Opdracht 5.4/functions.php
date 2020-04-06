<?php
//de action is hetzelfde script als het formulier, eerst testen of het formulier
//verzonden is
if (isset($_POST['submit'])) {
    echo "<h3>Wat is de situatie en wat moet ik doen?</h3><div>";
    //Een van de of beide radiobuttons is/zijn niet aangevinkt
    if (!isset($_POST['trafficLightColor']) || !isset($_POST["ambulance"])) {
        echo "Of stoplichtkleur is onbekend of het is nog onbekend of de ambulance komt.";
    }
 else
 {
     $trafficLightColor = $_POST["trafficLightColor"];
     $ambulanceComing = $_POST["ambulance"];
     echo "Stoplicht staat op $trafficLightColor en er komt: $ambulanceComing een
    ambulance aan.";
     //Bepalen of je wel of niet mag doorrijden
     if ($trafficLightColor <> "groen" || $ambulanceComing == 'ja')
     {
         echo "<div class='rood'>U moet stoppen</div>";
     }
     else
     {
         echo " <div class='groen'>U mag doorrijden</div>";
     }
 }
 echo "</div>";
 }
?>