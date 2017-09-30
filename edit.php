<?php
$org = "ORG";
if(isset($_POST["org"]))
{
    $org = $_POST["org"];
}
if($org == "ORG")
{
    echo "{'code': -1, 'msg':'Un-Authorised'}";
    die();
}

require "helpers/Comm.php";

$title = $_POST["title"];
$ldrs = $_POST["leaders"];
$songs = $_POST["songs"];
$date = $_POST["date"];
$id = $_POST["id"];

$sql = NewSQLConnection();

$QLine = "UPDATE Worships SET title='$title',leaders='$ldrs',songs='$songs',date='$date' where id=$id";
if ($sql->query($QLine) === TRUE) {
    echo "{\"code\": \"0\", \"msg\":\"Updated\"}";
} else {
    echo "{\"code\": \"0\", \"msg\":\"Database Failed\"}";
}
?>