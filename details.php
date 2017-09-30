<?php
$org = "ORG";
if(isset($_POST["org"]))
{
    $org = $_POST["org"];
}
if($org == "ORG")
{
    echo "{'code': '-1', 'msg':'Un-Authorised'}";
    die();
}

if(!isset($_POST["id"]))
{
    echo "{'code': '-1', 'msg':'Un-Authorised'}";
    die();
}
$id = $_POST["id"];

require "helpers/Comm.php";
$sql = NewSQLConnection();
if($sql == null)
{
    echo "{'code': '-1', 'msg':'Database failed'}";
    die(); 
}
$Qline = "SELECT * FROM Worships WHERE Church='$org' and id=$id ORDER BY id DESC;";
$result = $sql->query($Qline);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo '{"id": "' . $row["id"]. '","title":"' . $row["title"]. '","date":"' .$row["date"]. '","leaders":' .$row["leaders"]. ',"songs":' .$row["songs"]. '}';
    $sql->close();
    die();
} else {
    echo "[]";
    $sql->close();
    die();
}
?>