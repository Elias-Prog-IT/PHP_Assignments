<!--
@author: Elias Posluk
Student-id: elipos-5
Uppgift 2, innanför loginsidan. index.php
@date 26/04/2021
Luleå tekniska universitet
Webbutveckling II - Skriptspråk och databaser
-->
<!DOCTYPE html>

<html lang="en">
<head>
    <title>Login</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css" />
    <!-- Inkluderar lite css. -->
</head>
<body>

<?php
session_start();
//Kollar om inloggningen stämmer, då kommer användaren in i sidan och blir välkommen.
if(isset($_SESSION['user_loggedin']) && $_SESSION['user_loggedin'] == 1){ ?>

    <table>
        <tr>
            <td>
                <h1 class= 'indexAccepted'> Välkommen <?php echo $_SESSION['user_username']; ?>, du är inloggad! </h1>
            </td>
        </tr>
        <tr>
            <td>
                <form action="logout.php" method="get" style="display: inline">	<!-- knappen loggar ut och omdirigerar till inloggningssidan. -->
                    <button class= 'logOut' >Logga ut</button>
                </form>
            </td>
        </tr>
    </table>

<?php } else{
    header('location:login.php');//omdirigeras till inloggningssidan.
}

?>
</body>
</html>
