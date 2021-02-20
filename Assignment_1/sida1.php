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
    <title>PHP-sida1</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css" />
    <!-- Inkluderar lite css. -->
</head>

<body>

<!-- H1-rubrik-->
<h1> Välkommen till min första PHP-sida gjord av Elias Posluk!</h1>
<!--Paragraph-->
<p>Denna sida tar emot användarnamn och skriver ut hälsningen "Hej [användarnamn]!" <br>Om användaren inte skriver in något så kommer sidan att skriva ut mitt namn istället. <br>
    På raderna under så skriver sidan också ut användarnamnet baklänges, gemener, versaler och antalet tecken!</p>

<p><!--Uppgift 5. Skriv ut texten "Denna text är genererad med utskriftskommandot i PHP".-->
    <?php
    print "Denna text är genererad med utskriftskommandot i PHP!";
    ?>
</p>

<!-- Uppgift 6.	Skapa ett formulär där användaren kan mata in ett namn. -->
<form method="post">
    <label>
        <input type="text" name="user_name" placeholder="Ditt namn här..."
            <?php if(isset($_POST['user_name'])){ ?> value="<?php echo $_POST['user_name']; ?>" <?php } ?>> <!--tar emot värden från användaren-->
    </label>
    <br><br>
    <input type="submit" name="button_submit">
</form>


<?php
if(isset($_POST['button_submit'])){ //När användaren trycker på knappen

    //7a. Sparar namnet från formuläret i en variabel strName, finns inget namn skickat från formuläret används istället ditt namn.

    if($_POST['user_name'] != ""){ #Kollar om strängen har värde
        $strName = $_POST['user_name'];
    } else if($_POST['user_name'] == ""){
        $strName = "Elias"; #Om strängen inte har ett värde, så finns de ett default värde som är mitt namn som den skriver ut.
    }

    echo "<br><br> Utskrift: <br><br>";

    //7b. Skriver ut ”Hej” följt av värdet på strName.
    echo "Hej ".$strName."!<br>";

    //7c. På denna rad skriver den ut värdet i stränget baklänges.
    echo "Baklänges: ".strrev($strName)."<br>";

    //7d. På denna rad skriver den ut värdet i gemener.
    echo "Gemener: ".strtolower($strName)."<br>";

    //7e. På denna rad skriver den ut värdet i versaler.
    echo "Versaler: ".strtoupper($strName)."<br>";

    //7f. På denna rad skriver den ut antalet tecken i strName.
    echo "Antal tecken: ".strlen($strName);

}
?>

<?php
include('footer.php'); //Inkluderar footer.php som innehåller ett footer-element med texten: Luleå tekniska universitet | Webbutveckling II - Skriptspråk och databaser | elipos-5 | 2021
?>

</body>
</html>

