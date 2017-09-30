<?php
$org = "ORG";
if(isset($_POST["org"]))
{
    $org = $_POST["org"];
}
if($org == "ORG")
{
    echo "{\"code\": \"-1\", \"msg\":\"UN-AUTHORISED\"}";
    die();
}

if(!isset($_POST["id"]))
{
    echo "{\"code\": \"-1\", \"msg\":\"Confused\"}";
    die();
}
$id = $_POST["id"];

require "helpers/Comm.php";
$sql = NewSQLConnection();
if($sql == null)
{
    echo "{\"code\": \"-1\", \"msg\":\"Database Failed\"}";
    die(); 
}

$QLine = "DELETE FROM Worships WHERE id=$id";
if ($sql->query($QLine) === TRUE) {
    echo "{\"code\": \"0\", \"msg\":\"Deleted\"}";
} else {
    echo "{\"code\": \"0\", \"msg\":\"Database Failed\"}";
}
?>