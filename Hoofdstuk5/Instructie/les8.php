<?php
//includes van de pagina
include "../../includes/header.php";
include "../../includes/menu.php";
?>
    <main id="wrapper">
        <h2>Uitwerkingen</h2>
<!--        get kan worden vervangen door post-->
<!--        get laat info in de url info zien, post doet dit niet-->
<!--        action stuurt de info van het form naar een specifieke pagina-->
        <form method="get" action="2epagina.php">
            <label for="firstname">voornaam: </label><input type="text" name="firstname" id="firstname">
            <label for="lastname">achternaam: </label><input type="text" name="lastname" id="lastname">
            <select name="subject">
                <option value="php">PHP</option>
                <option value="css">CSS</option>

            </select>
            <input type="submit">
        </form>
    </main>
<?php
include "../../includes/footer.php";
?>