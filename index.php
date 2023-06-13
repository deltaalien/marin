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
    <title>Prijava</title>
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
<h1>Početna</h1>
<?php
    if(!prijavljen())
    {
        echo '<form action="index.php" method="post">';
        echo '<input type="text" name="korime" id="korime" placeholder="Unesite korisničko ime"> <input type="password" name="lozinka" id="lozinka" placeholder="Unesite lozinku"> <button type="button" id="prijava">Prijavite se</button><br>';
        echo "</form>";
        echo "<div id='status'></div>";
    }
    else
    {
        echo "Prijavljeni ste kao {$_SESSION['user']} ({$_SESSION['status']})<br>";
        echo "<a href='index.php'>Početna</a> | <a href='vesti.php'>Vesti</a> | <a href='korisnici.php'>Korisnici</a> | <a href='index.php?odjava'>Odjavite se</a> ";
    }

    ?>

    <hr>
    <div id="vesti"></div>
<?php



?>
</form>
</body>
</html>

