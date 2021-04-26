<!--
@author: Elias Posluk
Student-id: elipos-5
Uppgift 2, logga ut sida
@date 26/04/2021
Luleå tekniska universitet
Webbutveckling II - Skriptspråk och databaser
-->

<?php
//Loggar ut användaren och omdirigerar tillbaka till login sidan. login.php
session_start();

$_SESSION['user_loggedin'] = "";

header('location:login.php');

?>