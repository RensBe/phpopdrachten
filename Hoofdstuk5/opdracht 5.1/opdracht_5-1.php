<?php
//includes van de pagina
include "../../includes/header.php";
include "../../includes/menu.php";
?>
<main id="wrapper">
    <h2>Uitwerkingen</h2>
    <h3>
        Restaria Kees Kroket
    </h3>
    <p>
        Visstraat 12<br>
        5211DN 'S-Hertogenbosch<br>
        073 613 6720<br>
        info@restariakeeskroket.nl
    </p>
    <form action="form_data.php" method="get">
        <label>Bedrijfsnaam </label><br>
        <input name="companyName" type="text"><br>
        <br>
        <label>Voornaam</label><br>
        <input name="firstName" type="text"><br>
        <br>
        <label>Achternaam</label><br>
        <input name="surName" type="text"><br>
        <br>
        <labal>Telefoon</labal><br>
        <input name="telephoneNumber" type="text"><br>
        <br>
        <label>E-mail</label><br>
        <input name="email" type="email"><br>
        <br>
        <label>Bericht</label><br>
        <input name="message" type="text"><br>
        <input type="submit" name="send" value="versturen">
    </form>
</main>
<?php
include "../../includes/footer.php";
?>
