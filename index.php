<?php
session_start();
require_once("funkcije.php");
if(isset($_GET['odjava']))
{
    unset($_SESSION['userId']);
    unset($_SESSION['user']);
    unset($_SESSION['status']);
    session_destroy();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <script src="jquery-3.6.0.min.js"></script>
    <script src="funkcije.js"></script>
    <style>
        .spoljni{
            border:1px solid black;
            margin: 2px;
            padding: 2px;
            width: 500px;
        }
    </style>
</head>
<body>
<?php
    if(!prijavljen())
    {   echo '<div style="background: orange; padding: 5px; width: 40%;  border: 1px solid black;">';
        echo '<form action="index.php" method="post" >';
        echo '<input type="text" name="korime" id="korime" placeholder="Unesite korisničko ime"> <input type="password" name="lozinka" id="lozinka" placeholder="Unesite lozinku"> <button type="button" id="prijava">Prijavite se</button><br>';
        echo "</form>";
        echo "<div id='status'></div>";
        echo "</div>";
    }
    else
    {
        echo "Prijavljeni ste kao {$_SESSION['user']} ({$_SESSION['status']})<br>";
        echo "<a href='index.php'>Početna</a> | <a href='vesti.php'>Vesti</a> | <a href='korisnici.php'>Korisnici</a> | <a href='index.php?odjava'>Odjavite se</a> ";
    }

    ?>

<br>
<h1>SOKO VOZ - REZERVACIJA</h1>
<?php
ucitajKarte();


?>
</form>
</body>
</html>

