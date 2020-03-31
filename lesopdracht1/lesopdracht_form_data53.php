<?php
//Haal de formulier gegevens op
//include hieronder "lesopdracht_function.php" die de naam van de docent terug geeft.
require "lesopdracht_functions53.php";
?>
<table>
    <tr>
        <td>Voornaam</td>
        <td><?php
            echo $_GET["firstname"]
            ?></td>
    </tr>
    <!-- Begin: Toon dit alleen als er een tussenvoegsel is ingevuld! -->
    <?php
    if(!empty($_GET["tussenvoegsel"])) {
        echo "<tr>
        <td>Tussenvoegsel</td>
        <td>";
        echo $_GET['tussenvoegsel'];
        echo "</td></tr>";
    }
    ?>
    <!-- Einde: Toon dit alleen als er een tussenvoegsel is ingevuld! -->
    <tr>
        <td>Achternaam</td>
        <td><?php
            echo $_GET["lastname"]
            ?></td>
    </tr>
    <tr>
        <td>Meer informatie</td>
        <td>
            <?php
            if($_GET["subject"] == "php" || $_GET["subject"] == "js") {
                echo getTeacherName($_GET["subject"]);
            }
            ?>
        </td>
    </tr>
</table>