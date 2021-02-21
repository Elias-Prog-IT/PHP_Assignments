<!--
@author: Elias Posluk
Student-id: elipos-5
Uppgift: PHP-sida 1
@date 20/02/2021
Luleå tekniska universitet
Webbutveckling II - Skriptspråk och databaser
-->

<!DOCTYPE html>

<html lang="en">

<head>
    <title>PHP-sida2</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css" />
    <!-- Inkluderar lite css. -->
</head>
<body>
<h1> Välkommen till min andra PHP-sidan gjord av Elias Posluk!</h1>
<p>Denna sida tar emot input i form av 3st djur som man kan hitta i en bondgård.</p>
<form method="post">
    <!-- Användaren matar in första djuret i första rutan, required är implementerad för att få användaren att skriva in i rutan-->
    <!--tar emot värden från användaren-->
    <label>
        <input type="text" name="animal_1" placeholder="Mata in första djuret!" required <?php if(isset($_POST['animal_1'])){ ?> value="<?php echo $_POST['animal_1']; ?>" <?php } ?>>
    </label>

    <!-- Användaren matar in andra djuret i andra rutan, required är implementerad för att få användaren att skriva in i rutan-->
    <label>
        <input type="text" name="animal_2" placeholder="Mata in andra djuret!" required <?php if(isset($_POST['animal_2'])){ ?> value="<?php echo $_POST['animal_2']; ?>" <?php } ?>>
    </label>

    <!-- Användaren matar in tredje djuret i tredje rutan, required är implementerad för att få användaren att skriva in i rutan-->
    <label>
        <input type="text" name="animal_3" placeholder="Mata in tredje djuret!" required <?php if(isset($_POST['animal_3'])){ ?> value="<?php echo $_POST['animal_3']; ?>" <?php } ?>>
    </label>

    <br><br>
    <input type="submit" name="button_submit">
</form>

<?php
if(isset($_POST['button_submit'])){ //När användaren trycker på knappen


    //2a. Sparar djuren som är inmatade i formuläret till arrayen $farmAnimals, första djuret ska ligga på index 0 i arrayen, andra djuret på index 1 och tredje djuret på index 2.
    //Kollar så att variablerna innehåller värden
    if($_POST['animal_1'] != "" && $_POST['animal_2'] != "" && $_POST['animal_3'] != ""){
        $farmAnimals = array($_POST['animal_1'],$_POST['animal_2'],$_POST['animal_3']);
    }

    echo "<br><br> Utskrift <br><br>";

    //2b. Skriver ut arrayen i råformat med funktionen print_r.
    echo "Bondgårds arrayen i råformat: ";
    print_r($farmAnimals);

    //2c. Ersätter djuret på tredje platsen med djuret ”Struts”.
    $farmAnimals[2] = "Struts";

    //2d. Lägger till ett fjärde djur ”Alpacka” sist i arrayen.
    $farmAnimals[3] = "Alpacka";

    //2e.Tar bort det första elementet helt från arrayen.
    array_shift($farmAnimals);

    //2f. Skriver ut arrayen i råformat med funktionen print_r.
    echo "<br>Uppdaterad bondgård: ";
    print_r($farmAnimals);

    //2g. Skriver ut elementet som finns på andra platsen i arrayen, vilket nu borde vara ”Struts” eftersom det första djuret är borttaget.
    echo "<br><br>";
    echo "Skriver ut elementet som finns på andra platsen i arrayen: <br>";
    print_r($farmAnimals[1]);

}
?>

<?php
include('footer.php'); //Inkluderar footer.php som innehåller ett footer-element med texten: Luleå tekniska universitet | Webbutveckling II - Skriptspråk och databaser | elipos-5 | 2021
?>


</body>
</html>
