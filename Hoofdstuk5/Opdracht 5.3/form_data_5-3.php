<?php
//includes van de pagina
include "../../includes/header.php";
echo "<link href='Style.css' rel='stylesheet' type='text/css'>";
include "../../includes/menu.php";
require "../../includes/functions.php";
?>
<main id="wrapper">
    <h2>Uitwerkingen</h2>
<!--    creëren table-->
    <table>
        <tr>
            <th>
                Vraag
            </th>
            <th>
                Antwoord
            </th>
        </tr>
        <tr>
            <td>
                <label>Naam</label>
            </td>
            <td>
                <?php
//                steeds hetzelfde, je echod wat uit het formulier komt.
                echo $_POST["name"]
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Leeftijd</label>
            </td>
            <td>
                <?php
                echo $_POST["age"]
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Gemeente</label>
            </td>
            <td>
                <?php
                echo $_POST["gemeente"]
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Inwoners</label>
            </td>
            <td>
                <?php
                echo $_POST["citizens"]
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Aantal besmet</label>
            </td>
            <td>
                <?php
                echo $_POST["infected"]
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Kennissen besmet</label>
            </td>
            <td>
                <?php
                echo $_POST["knowInfected"]
                ?>
            </td>
        </tr>
<!--        laat alleen dit zien als er inderdaad iemand is die geïnfecteerd is-->
        <?php
        if ($_POST["knowInfected"] == "Ja") {
            echo "
        <tr>
            <td colspan='2'>
                De kans is in realiteit groter omdat je via je eigen netwerk besmet kan raken.
            </td>
        </tr>";
        }
        ?>
        <tr>
            <td>
                <label>Kans per ontmoeting op besmetting</label>
            </td>
            <td>
                <?php
//                haalt functie uit de functions.php
                echo echoKans();
                ?>
            </td>
        </tr>

        <tr>
            <td>
                <label>Kans is 1 op</label>
            </td>
            <td>
                <?php
                echo getKans1Op()
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <?php
                echo vergelijkOorzaken(getKans1Op())
                ?>
            </td>
        </tr>
    </table>
</main>
<?php
include "../../includes/footer.php";
?>
