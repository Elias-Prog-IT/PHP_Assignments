<!--
@author: Elias Posluk
Student-id: elipos-5
Uppgift: PHP-sida 6
@date 20/02/2021
Luleå tekniska universitet
Webbutveckling II - Skriptspråk och databaser
-->
<!DOCTYPE html>

<html lang="en">
<head>
    <title>PHP-sida6</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css" />
    <!-- Inkluderar lite css. -->
</head>
<body>

<h1> Välkommen till sjätte PHP-sidan gjord av Elias Posluk!</h1>

<?php

#Skickar iväg via GET
if(isset($_GET['user_name'])){
    echo "Användarens namn är: ".$_GET['user_name']." (received via GET). <br>";
}

if(isset($_GET['user_phone'])){
    echo "Tele-nr till användaren är: ".$_GET['user_phone']." (received via GET). <br>";
}

#Skickar iväg via POST
if(isset($_POST['user_name'])){
    echo "Användarens namn är: ".$_POST['user_name']." (received via POST). <br>";
}

if(isset($_POST['user_phone'])){
    echo "Tele-nr till användaren är: ".$_POST['user_phone']." (received via POST). <br>";
}


include('footer.php');//Inkluderar footer.php  som innehåller ett footer-element med texten: Luleå tekniska universitet | Webbutveckling II - Skriptspråk och databaser | elipos-5 | 2021
?>

<a href="sida6.html">
    <button> Tillbaks till html </button>
</a>

</body>
</html>