<!--
@author: Elias Posluk
Student-id: elipos-5
Uppgift 2, loginsida
@date 26/4/2021
Luleå tekniska universitet
Webbutveckling II - Skriptspråk och databaser
-->
<?php
session_start();

if(isset($_POST['btn_register'])){ // om man klickar på knappen "Spara ny användare"

    if( isset($_POST['username']) && $_POST['username'] == ""){ //kontrollerar om användarnamnet har angetts eller inte
        echo "<div ><h3 class = 'wrong'> Inget användarnamn specificerat </h3></div><br>";
    }

    else if(isset($_POST['password']) && $_POST['password'] == ""){ //kontrollera om lösenord har angetts eller inte
        echo "<div ><h3 class = 'wrong'> Inget lösenord angett </h3></div><br>";
    }

    //om användarnamnet och lösenordet har angetts, fortsätter med att kontrollera om användarnamnet redan finns i textfilen
    else if( file_exists("credentials.txt") && strpos(strtolower(file_get_contents("credentials.txt")),strtolower($_POST['username'])) !== false) {
        echo "<div ><h3 class = 'wrong' > Användarnamn existerar redan </h3></div><br>";
    } else{
        //om användarnamn inte finns i textfilen
        //lösenordet använder hash funktionen som kom med i uppgiften.
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $_SESSION['hash'] = $hash; //Den hashade lösenordet sparas, för att kunna logga in under andra tillfällen.

        //öppnar upp filen i "append" mode
        $myfile = fopen("credentials.txt", "a") or die("Unable to open file!");//Öppnar upp filen i skrivläge
        $txt = $_POST['username'].";".$hash." \n"; //Tilldelar användarnamnet och hashade-lösenordet till variabeln
        fwrite($myfile, $txt); //Skriver användarnamnet och hashade-lösenordet till filen

        echo "<div ><h3 class = 'accepted'> Den nya användaren har sparats </h3></div><br>";
    }
} else if(isset($_POST['btn_login'])){ //Om man klickar på "logga in".

    //Kontrollerar om $_SESSION['hash'] finns och om något har sparats i textfilen.
    if(isset($_SESSION['hash'])){
        //kontrollera om lösenordet är korrekt med funktionen "password_verify"
        $isCorrectPassword = password_verify($_POST['password'], $_SESSION['hash']);
    } // $isCorrectPassword kommer ge värdet 1 (true) om rätt lösenord matchar med den hashade-lösenordet som har sparats i textfilen.

    if( isset($_POST['username']) && $_POST['username'] == ""){ //Kontrollerar om användarnamnet har angetts
        echo "<div ><h3 class = 'wrong'> Inget användarnamn specificerat </h3></div><br>";
    }

    if(isset($_POST['password']) && $_POST['password'] == ""){ //kontrollerar om lösenord har angetts
        echo "<div ><h3 class = 'wrong'> Inget lösenord angett </h3></div><br>";
    }

    //Om användarnamnet och lösenordet har angetts, så kommer kontrollen kolla om användarnamnet är skiftlägeskänsligt (case in-sensitive) (Den ska inte vara känslig för användarnamn)
    //Lösenordet är dock skiftkänslig (case-sensitive) och ska vara exakt som man registrera första gången.
    else if( file_exists("credentials.txt") && strpos(strtolower(file_get_contents("credentials.txt")),strtolower($_POST['username'])) !== false){
        $file = fopen("credentials.txt", "r");
        //läser filen och hittar raden med det matchade användarnamnet och verifierade lösenordet
        while(!feof($file)){
            $row = fgets($file);
            if(strpos(strtolower($row),strtolower($_POST['username'])) !== false){
                $arr = explode(";", $row);

                if(password_verify($_POST['password'],trim($arr[1]))){
                    //Ställer in "user_loggedin" till 1 så att den kan kontrolleras i index.php. notera att "user_loggedin" är en variabel,
                    // därför kan man namnge den vad man önskar.
                    $_SESSION['user_loggedin'] = 1;

                    //Sparar det angivna användarnamnet i session variabeln "användarnan" så att det kan visas i index.php
                    $_SESSION['user_username'] = $_POST['username'];


                    header('location:index.php'); //omdirigerar till index.php
                    exit();
                }
            }
        }
        echo "<div ><h3 class = 'wrong'> Felaktigt användarnamn och eller fel lösenord. </h3></div><br>";

    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css" />
    <!-- inkluderar lite css -->
</head>

<body>
<form action="#" method="post">
    <table class = 'table'>
        <tr>
            <td class = "username">Användarnamn</td>
            <td>
                <label class = "label1">
                    <input type="text" name="username" placeholder="Ditt användarnamn här..." required>
                </label>
            </td></tr>
        <tr>
            <td>Lösenord</td>
            <td>
                <label class = "label2">
                    <input type="password" name="password" placeholder="Ditt Lösenord här..." required>
                </label>
            </td>
        </tr>
        <tr><td><br></td></tr>
        <tr>
            <td >
                <input class = "button1" type="submit" value="Logga in" name="btn_login">
                <input class = "button2" type="submit" value="Spara ny användare" name="btn_register">
            </td>
        </tr>
    </table>
</form>

</body>
</html>

