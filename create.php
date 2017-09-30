<?php
$org = "ORG";
if(isset($_POST["org"]))
{
    $org = $_GET["org"];
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

$sql = NewSQLConnection();

$QLine = "INSERT INTO Worships (Church,title,leaders,songs,date) values ('$org', '$title', '$ldrs', '$songs', '$date')";
if ($sql->query($QLine) === TRUE) {
    echo "{\"code\": \"0\", \"msg\":\"Created\"}";
} else {
    echo "{\"code\": \"0\", \"msg\":\"Database Failed\"}";
}
?>