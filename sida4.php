<!--
@author: Elias Posluk
Student-id: elipos-5
Uppgift: PHP-sida 4
@date 20/02/2021
Luleå tekniska universitet
Webbutveckling II - Skriptspråk och databaser
-->

<!DOCTYPE html>

<html lang="en">

<head>
    <title>PHP-sida4</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css" />
    <!-- Inkluderar lite css. -->
</head>
<body>

<h1> Välkommen till den fjärde PHP-sidan gjord av Elias Posluk!</h1>

<p> Denna sida beräknar omkretsen och arean av rektangel som användaren skriver in.</p>

<!-- 5.	Skapar ett formulär där användaren kan mata in värden för längd och bredd. -->
<!--tar emot värden från användaren-->
<form method="post">
    <label>
        <input type="number" name="length" placeholder="Ange längd..." required <?php if(isset($_POST['length'])){ ?> value="<?php echo $_POST['length']; ?>" <?php } ?>>
    </label>

    <br><br>
    <label>
        <input type="number" name="width" placeholder="Ange bredd..." required <?php if(isset($_POST['width'])){ ?> value="<?php echo $_POST['width']; ?>" <?php } ?>>
    </label>

    <br><br>

    <input type="submit" name="button_submit" value="Beräkna">
</form>

<?php

//4. Skapar en funktion som heter calculateCircumference som beräknar omkretsen av en rektangel och skriver ut omkretsen. Funktionen ska ta emot två parametrar: length och width vilket används för att beräkna omkretsen.
function calculateCircumference($length,$width){
    $circumference = 2*($length+$width);

    //8. Anropar funktionen calculateArea inifrån funktionen calculateCircumference, skickar in längd och bredd som argument till funktionen calculateArea.
    calculateArea($length,$width);


    //9. Modifierar funktionen calculateCircumference så att den skriver ut omkrets och area när användaren trycker på knappen "Beräkna". Ingen utskrift ska göras i funktionen calculateArea.
    echo "Omkretsen är: ".$circumference."<br><br>";
    echo "Arean är: ".calculateArea($length,$width);
}

//7.	Skapar en funktion som heter calculateArea som beräknar arean av en rektangel och returnerar arean. Funktionen ska ta emot två parametrar: length och width vilka används för att beräkna arean.
function calculateArea($length,$width){
    $area = $length*$width;
    return $area;
}


//6. När användaren trycker på en knapp med titeln "Beräkna" så ska värden läsas från formuläret och funktionen calculateCircumference anropas med längd och bredd som argument.

if(isset($_POST['button_submit'])){ //När användaren trycker på knappen

    echo "<br><br> Utskrift <br><br>";

    if($_POST['length'] != "" && $_POST['width'] != ""){
        calculateCircumference($_POST['length'],$_POST['width']);
    }

}

include('footer.php'); //Inkluderar footer.php som innehåller ett footer-element med texten: Luleå tekniska universitet | Webbutveckling II - Skriptspråk och databaser | elipos-5 | 2021
?>

</body>
</html>
