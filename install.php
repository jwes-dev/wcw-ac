<?php
$org = "ACA AVADI";

require "helpers/Comm.php";

$un = "jwes.device@outlook.com";
$pwd = password_hash("Daniel@1997", PASSWORD_DEFAULT);
$role = "Admin";

$sql = NewSQLConnection();

$QLine = "INSERT INTO Users (Church,UserName,Password,Role) values ('$org', '$un', '$pwd', '$role')";
if ($sql->query($QLine) === TRUE) {
    echo "{\"code\": \"0\", \"msg\":\"Created\"}";
} else {
    echo "{\"code\": \"-1\", \"msg\":\"Database Failed\"}";
}
?>