<?php
//includes van de pagina
include "../../includes/header.php";
?>
        <link type="text/css" rel="stylesheet" href="stylesheet.css">
<?php
include "../../includes/menu.php";
include "../functions.php";
?>
        <main>
            <h1>
                Nieuwe grap toevoegen
            </h1>
            <form action="insert.php" method="post">
                Joketext <input type="text" name="Joketext" placeholder="Joketext komt hier"><br>
                Jokeclou <input type="text" name="Jokeclou" placeholder="Jokeclou komt hier"><br>
                <input type="submit" name="submit" value="Verstuur">
            </form>
            <?php
            //starten van een database connectie
            startConnection();
            //het zetten van de timezone
            date_default_timezone_set("EST");
            //invullen $query
            $query = "INSERT INTO joke VALUES('".$_POST["Joketext"]."', '".$_POST["Jokeclou"]."', '".date("Y-m-d")." 00:00:00.000')";
            //checkt of alles is ingevuld
            if(isset($_POST["Joketext"]) && isset($_POST["Jokeclou"]))
            {
                //de query echoën
                echo($query);
                //de functie gebruiken
                executeQueryViaExec($query);
                //als het werkt laten zien wat er is toegevoegd
                echo("<h1>Grap toegevoegd!</h1><p>Bedankt voor het toevoegen van je grap. Hieronder zie je een overzicht van je grap:</p><br>");
                echo("<p><i>joketext</i>". $_POST["Joketext"] ."</p><br>");
                echo("<p><i>jokeclou</i>". $_POST["Jokeclou"] ."</p><br>");
                ?>
                <a href='<?php echo  $base_url;//link naar opdracht 7.3?>hoofdstuk 7/opdracht 7.3/index.php'>Bekijk grappen (opdracht 7.3)</a>
                <?php
            }
            else
            {
                echo("Vul het formulier volledig in");
            }
            ?>
        </main>
<?php
include "../../includes/footer.php";
?>