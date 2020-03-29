<?php
//includes van de pagina
include "../../includes/header.php";
include "../../includes/menu.php";
?>
    <main id="wrapper">
        <h2>Uitschrijfformulie KW1C</h2>
        <hr>
<!--        aanmaken form-->
        <form action="Uitschrijving.php" method="get">
<!--            aanmaken tabel-->
            <table>
<!--                steeds hetzelfde, text komt in een label de input komt in een input te staan met een naam en een type-->
                <tr>
                    <td>
                        <label>Voor en Achternaam</label>
                    </td>
                    <td>
                        <input name="firstSurName" type="text">
                    </td>
                </tr>
                <tr>
                    <td>
                        Studentennummer
                    </td>
                    <td>
                        <input name="studentNumber" type="number">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Datum van uitschrijving</label>
                    </td>
                    <td>
                        <input name="dateDeregistration" type="date">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Reden van uitschrijving</label>
                    </td>
                    <td>
<!--                        drop down lijst-->
                        <select id="reason" name="reasonDeregistration">
                            <option value="why">Waarom</option>
                            <option value="Would">Zou</option>
                            <option value="You">Je</option>
                            <option value="Want to">Willen?</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Leerjaar
                    </td>
                    <td>
<!--                        radio button lijst-->
                        <input name="year" type="radio">Leerjaar 1<br>
                        <input name="year" type="radio">Leerjaar 2<br>
                        <input name="year" type="radio">Leerjaar 3
                    </td>
                </tr>
            </table>
<!--            de checkboxjes-->
            <input name="succesklas" type="checkbox" value="Ja"> Ik wil me aanmelden bij de succesklas<br>
            <input name="delete" type="checkbox" value="Ja"> Verwijder mijn gegevens uit het systeem<br>
            <label>Geef hieronder je reden van je uitschrijving</label><br>
<!--            de textarea-->
            <textarea name="reasonFull" rows="4" cols="30"></textarea><br>
<!--            en de submit knop-->
            <input type="submit" name="submit">
        </form>
    </main>
<?php
include "../../includes/footer.php";
?>