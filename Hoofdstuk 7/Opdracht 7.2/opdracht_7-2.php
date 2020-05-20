<?php
//includes van de pagina
include "../../includes/header.php";
include "../../includes/menu.php";
?>
    <main id="wrapper">
        <h2>Uitwerkingen</h2>
        <?php
        //!!! note, ik heb geen verbinding met mijn database kunnen verkrijgen omdat ik nog niet kan inloggen.
        try
        {
            $pdo = new PDO("odbc:odbc2sqlserver");
        }
        catch (PDOException $e)
        {
            echo "<h1>Database error:</h1>";
            echo $e->getMessage();
            die();
        }
        // taak 3
        //alles selecteren wat er in de sql zit en stoppen in een variabele
        $aJokes = 'SELECT * FROM joke';
        $aJokes = $pdo->query($aJokes);
        print_r($aJokes);
        // in dit geval neem ik aan dat aJokes een array is met objecten.
        //dus eerst haal ik voor elke instance in de array het object eruit
        foreach($aJokes as $jokeNumber)
        {
            //en van de objecten heb ik ze gesplitst in de naam (zoals ID) en de value (zoals 1,2,3,4,5)
            foreach($jokeNumber as $name => $value)
            {
                //als de naam gelijk is aan joketext moet hij het laten zien (net zoals in de opdracht)
                if($name == 'joketext')
                {
                    echo $value;
                }
                //en als de naam gelijk is aan jokeclou moet hij het laten zien en maakt hij een nieuwe regel aan.
                else if($name == 'jokeclou')
                {
                    echo $value."<br>";
                }
            }
        }

        //taak 4
        //eerst aanmaken van de tabel
        echo "<table><tr><th>ID</th><th>Joketext</th><th>Jokeclou</th><th>Jokedate</th></tr>";
        //weer de objecten van elkaar halen uit de array
        foreach($aJokes as $jokeInstance)
        {
            //aanmaken rij
            echo "<tr>";
            //splitsen van het object
            foreach($jokeInstance as $name => $value)
            {
                //$name wordt niet gebruikt omdat we toch alle info gaan gebruiken
                echo "<td>".$value."</td>";
            }
            //afsluiten rij
            echo "</tr>";
        }
        //afsluiten tabel
        echo "</table>";

        //!!! wat ook mogelijk is is dat het een object is met arrays of een array met arrays.
        //!!! daarnaast neem ik aan doordat er maar een tabel in de SQL is dat het niet een
        //!!! object(de tabel) met arrays(alle instancies in de tabel) met objecten(de info per instansie) is
        //!!! daarnaast is het laatste buiten te sluiten door te kijken naar de manier hoe we de info hebben geselecteerd.
        ?>
    </main>
<?php
include "../../includes/footer.php";
?>