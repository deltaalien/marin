<?php
function prijavljen()
{
    if(isset($_SESSION['user']) and isset($_SESSION['userId']) and isset($_SESSION['status']) )
        return true;
    else
        return false;
}

function konekcija()
{
    $db=@mysqli_connect("localhost", "root","", "pva_jun_23");
    if(!$db) return false;
    mysqli_query($db, "SET NAMES utf8");
    return $db;
}