<!--
* User: Rens Bedijn
* Date: 5-2-2020
* Time: 13:43 PM
* File: opdracht_2-1.php
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="css/opdracht_2-1.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
    <h1><?php echo "opdracht 2.1"; ?></h1>
</header>
<aside>
    <h2>
        Menu
    </h2>
    <p>
        <?php
//        string
        $car = "Audi";
//        boolean
        $license = true;
//        int
        $age = 18;
//        float
        $price = 20000.99;
        /*
         * commentaar
        */
        echo $car."kan alleen bereden worden als je auto rijbewijs ".$license." is en de prijs is ".$price;
        ?>
    </p>

</aside>
<main id="wrapper">
    <h2>Uitwerkingen</h2>
</main>
</body>
</html>