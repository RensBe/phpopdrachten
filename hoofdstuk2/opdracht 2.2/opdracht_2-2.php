<!--
* User: Rens Bedijn
* Date: 7-2-2020
* Time: 13:43 PM
* File: opdracht_2-2.php
-->
<?php
$text1 = "Hallo";
$text2 = "toch een makkelijke taal";
$text3 = "wat is";
$text4 = "PHP";
$text5 = "nooit gedacht dat";
$text6 = "de ingewikkelde installatie";
$text7 = "Fijn toch?";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h2>
            Taak 2
        </h2>
        <p>
            <?php
                echo $text1." ".$text3." ".$text4." ".$text2
            ?>
        </p>
        <p>
            <?php
                echo $text3." ".substr($text2,0,4)." ".$text6." ".$text7
            ?>
        </p>
        <p>
            <?php
                echo $text5." ".$text4." ".$text2." ".$text3
            ?>
        </p>
        <h2>
            Taak 3
        </h2>
        <p>
            <?php
                echo $text1.", ".$text3." ".$text4.", ondanks ".$text6." ".$text2."?"
            ?>
        </p>
        <p>
            <?php
                echo $text7." ".$text5." ".$text4." eigenlijk ".$text2." blijkt te zijn!"
            ?>
        </p>
    </body>
</html>