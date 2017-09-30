<?php
if(!isset($_POST["uname"]) || !isset($_POST["pwd"]))
{
    echo "{\"code\": \"-1\", \"msg\":\"In Valid\"}";
    die();
}
$UN = $_POST["uname"];
$pwd = $_POST["pwd"];

require "helpers/Comm.php";

$sql = NewSQLConnection();
$QLine = "SELECT * FROM Users WHERE UserName='$UN';";
$result = $sql->query($QLine);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hsh = $row["Password"];
    if(password_verify($pwd, $hsh))
    {
        echo "{\"code\": \"0\", \"msg\":[\"".$row["Role"]."\",\"".$row["Church"]."\"]}";
        die();
    }
    else
    {
        echo "{\"code\": \"-1\", \"msg\":\"In Valid Login\"}";
        die();
    }
}
else
{
    echo "{\"code\": \"-1\", \"msg\":\"No data found\"}";
    die();
}
?>