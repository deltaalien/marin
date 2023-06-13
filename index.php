<?php
session_start();
require_once("funkcije.php");
if(isset($_GET['odjava']))
{
    unset($_SESSION['userId']);
    unset($_SESSION['user']);
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
        echo "Prijavljeni ste kao {$_SESSION['user']}<br>";
        echo "<a href='admin.php'>Potvrdi rezervacije</a> | <a href='index.php?odjava'>Odjavite se</a> ";
    }

    ?>

<br>
<h1>SOKO VOZ - REZERVACIJA</h1>

<table>
<tr>
<td>
<?php
ucitajKarte();
?>
<td>
<div style="background: grey; border: 1px solid black; padding-left: 10%; padding-right: 10%; width: 100%">
    <h3>Unesite vase podatke</h3>
    <form>
        <input type="text" placeholder="Unesite destinaciju" id="destinacija" name="destinacija"/>
        <br />
        <select name="karta" id="karta">
            <option value="-1">--Izaberite vrstu karte--</option>
            <?php ucitajKarteSelect();?>
        </select>
        <br>
        <input type="date" id="datum" name="datum"/>
        <br/>
        <textarea type="textArea" id="kom" placeholder="Unesite info"> </textarea>
        <br/>
        <button id="rezervacija">Rezervisi kartu</button>
    </form>
</div>
</td>
</td>
</tr>
</table>
</form>
</body>
</html>

