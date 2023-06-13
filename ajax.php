<?php
session_start();
require_once("funkcije.php");
if(isset($_GET['funkcija']))
{
    $db=konekcija();
    if(!$db)
    {
        echo "Greška prilikom konekcije na bazu!!!!<br>".mysqli_connect_error();
        exit();
    }
    $f=$_GET['funkcija'];
    switch($f)
    {
        case "prijava":
            $korime=$_POST['korime'];
            $lozinka=$_POST['lozinka'];
            if($korime=="" or $lozinka=="")
            {
                echo "<span style='color:red'>Niste uneli sve podatke</span>";
                exit();
            }
            $sql="SELECT * FROM korisnici WHERE email='{$korime}'";
            $rez=mysqli_query($db, $sql);
            if(mysqli_num_rows($rez)==0)
            {
                echo "<span style='color:red'>Ne postoji korisnik sa tim korisničkim imenom</span>";
                exit();
            }
            $red=mysqli_fetch_object($rez);
            if($red->lozinka!=$lozinka)
            {
                echo "<span style='color:red'>Pogrešna lozinka za korisnika $korime</span>";
                exit();
            }
            $_SESSION['userId']=$red->id;
            $_SESSION['user']="$red->ime $red->prezime";
            echo "index.php";
            break;
    }
}