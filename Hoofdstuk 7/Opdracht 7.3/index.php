<?php


// Inladen functies en includes bestand
include "../../includes/header.php";
include "../../includes/menu.php";
include("functions.php");
echo "<main id=\"wrapper\"><h2>Uitwerkingen</h2>";
// Starten van een database connectie
startConnection();

// Executeren van een SQL query
$query = "SELECT * FROM joke";
if(!empty($_GET["search"]))
{
    $query = $_GET["search"];
}
$jokes = executeQuery($query);

echo "<p> $query </p>";
?>
    <form method="get" action="index.php">
        <b>Zoekterm:</b>
        <input type="text" name="search">
        <input type="submit" name="submit" value="Zoeken"><br>
        <hr>
        <table>
            <tr>
                <th>
                    JokeID
                </th>
                <th>
                    JokeText
                </th>
                <th>
                    Jokeclou
                </th>
                <th>
                    Jokedate
                </th>
            </tr>
            <?php
            // Resultaten rij voor rij ophalen
            while($row = $jokes->fetch(PDO::FETCH_ASSOC) )
            {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["jokedate"] . "</td><td>" .  $row["joketext"] . "</td><td>" . $row["jokeclou"] . "</td></tr>";
            }
            ?>
        </table>
    </form>
</main>
<?php
include "../../includes/footer.php";
?>
