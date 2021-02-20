<!--
@author: Elias Posluk
Student-id: elipos-5
Uppgift: PHP-sida 5
@date 20/02/2021
Luleå tekniska universitet
Webbutveckling II - Skriptspråk och databaser
-->

<!DOCTYPE html>

<html lang="en">
<head>
    <title>PHP-sida5</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css" />
    <!-- Inkluderar lite css. -->
</head>
<body>

<h1> Välkommen till den femte PHP-sidan gjord av Elias Posluk!</h1>

<p> Den här sidan visar namnet på servern som skriptet körs, användarens IP-adress, filnamnet på PHP-sidan, porten, på användarens dator som används för att kommunicera med webbservern och metoden som används för att köra PHP-sidan.</p>


<?php

echo "<br><br> Utskrift <br><br>";

//a. Namnet på den server som skriptet körs på.
echo "Namnet på den server som skriptet körs på: ".$_SERVER['SERVER_NAME']."<br>";
//Denna funkar  .php_uname("n").
//om inte .$_SERVER['SERVER_NAME']. funkar.

//b. Användarens IP-adress.
echo "<br>Användarens IP-adress: ".$_SERVER['REMOTE_ADDR']."<br>";

//c. Filnamnet på PHP-sidan.
echo "Filnamnet på PHP-sidan: ".basename($_SERVER['PHP_SELF'])."<br>";

//d. Den port, på användarens dator, som används för att kommunicera med webbservern.
echo "Den port, på användarens dator, som används för att kommunicera med webbservern: ".$_SERVER['SERVER_PORT']."<br>";

//e. Vilken metod som använts för att köra PHP-sidan
echo "<br>Den hostades på XAMPP version 3.2.4, i filen 'htdocs/Uppgift2/sida5/', 'http://localhost:63342/Uppgift2/sida5.php'";


include('footer.php');//Inkluderar footer.php som innehåller ett footer-element med texten: Luleå tekniska universitet | Webbutveckling II - Skriptspråk och databaser | elipos-5 | 2021
?>

</body>
</html>