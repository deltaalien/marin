<?php
function prijavljen()
{
    if (isset($_SESSION['user']) and isset($_SESSION['userId']))
        return true;
    else
        return false;
}

function konekcija()
{
    $db = @mysqli_connect("localhost", "root", "", "pva_jun_23");
    if (!$db)
        return false;
    mysqli_query($db, "SET NAMES utf8");
    return $db;
}

function ucitajKarte()
{
    $db = konekcija();
    $sql = "SELECT * FROM karte";
    $rez = mysqli_query($db, $sql);

    if (mysqli_num_rows($rez) == 0)
        echo "Nema karata";
    else {
        while ($red = mysqli_fetch_object($rez)) {
            echo "<div style='border: 1px solid black; background: orange; margin-bottom: 1px; padding: 0px'>";
            echo "<h4>$red->naziv</h4>";
            echo "<p>$red->komentar</p>";
            echo "</div>";
        }
    }
}

function ucitajKarteSelect(){
    $db = konekcija();
    $sql = "SELECT * FROM karte";
    $rez = mysqli_query($db, $sql);

    while ($red = mysqli_fetch_object($rez)) {
        echo "<option value='$red->id'>$red->naziv</option>";

    }
    
}