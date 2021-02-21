<!--
@author: Elias Posluk
Student-id: elipos-5
Uppgift: PHP-sida 3
@date 20/02/2021
Luleå tekniska universitet
Webbutveckling II - Skriptspråk och databaser
-->

<!DOCTYPE html>

<html lang="en">

<head>
    <title>PHP-sida3</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css" />
    <!-- Inkluderar lite css. -->
</head>
<body>

<h1> Välkommen till den tredje PHP-sidan gjord av Elias Posluk!</h1>

<!--Paragraph där jag förklarar vad man kan göra på sidan-->
<p> Denna sida innehåller:
    <br> Ett formulär med ett textfält där användaren kan skriva in ett antal ord separerade med mellanslag:
    <br> och ytterligare ett textfält där användaren kan skriva in ett sökord.
</p>

<!-- 1. Skapa ett formulär med ett textfält där användaren kan skriva in ett antal ord separerade med mellanslag: -->
<!--tar emot värden från användaren-->
<form method="post">
    <label>
        <input type="text" name="several_words" placeholder="Skriv in texten här..." required <?php if(isset($_POST['several_words'])){ ?> value="<?php echo $_POST['several_words']; ?>" <?php } ?> style='width:50%' >
    </label>
    <br><br>

    <!-- 2.Skapar ytterligare ett textfält där användaren kan skriva in ett sökord. -->

    <input type="text" name="keyword" placeholder="Sökord..." required <?php if(isset($_POST['keyword'])){ ?> value="<?php echo $_POST['keyword']; ?>" <?php } ?>>

    <br><br>
    <input type="submit" name="button_submit">
</form>

<?php
if(isset($_POST['button_submit'])){ //När användaren trycker på knappen


    //3a. Hämtar strängen med ord från textfältet och utifrån den genererar en array där varje ord hamnar på en egen plats i arrayen, ex: "jag gillar faktiskt misstag jag tycker att de är mänskliga".
    if($_POST['several_words'] != ""){
        $array = explode(" ",$_POST['several_words']);
    }

    echo "<br><br> Utskrift <br><br>";


    //3b. Sparar sökordet från det andra textfältet i en egen variabel.
    if($_POST['keyword'] != ""){
        $keyword = $_POST['keyword'];
    }

    //3c. Skriver ut arrayen med ord i råformat med funktionen print_r.
    echo "Användaren angav flera ord array i råformat är: ";
    print_r($array);


    //3d. Loopar igenom arrayen och använder en if-sats för att jämföra sökordet med varje ord i arrayen. Är ordet i arrayen lika med sökordet så skriver den ut platsen på sökordet.
    $occurrence = 0;
    echo "<br><br> Ordet ".$keyword." finns på plats: ";
    for($loop=0;$loop<count($array);$loop++){
        if($array[$loop] == $keyword)
        {
            echo $loop." ";
            $occurrence++;
        }
    }

    //3e. Skriver även ut hur många gånger som sökordet hittades i arrayen.
    echo "<br><br> Ordet ".$keyword." hittades ".$occurrence." gånger";

}
?>

<?php
include('footer.php'); //Inkluderar footer.php som innehåller ett footer-element med texten: Luleå tekniska universitet | Webbutveckling II - Skriptspråk och databaser | elipos-5 | 2021
?>

</body>
</html>