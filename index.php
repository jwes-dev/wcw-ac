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
$sql = NewSQLConnection();
if($sql == null)
{
    echo "{'code': -1, 'msg':'Database failed'}";
    die(); 
}
$Qline = "SELECT * FROM Worships WHERE Church='$org' ORDER BY id DESC;";
$result = $sql->query($Qline);
if ($result->num_rows > 0) {
    echo "[";
    $row = $result->fetch_assoc();
    echo '{"id": "' . $row["id"]. '","title":"' . $row["title"]. '","date":"' .$row["date"]. '"}';
    while($row = $result->fetch_assoc()) {
        echo ',{"id": "' . $row["id"]. '","title":"' . $row["title"]. '","date":"' .$row["date"]. '"}';
    }
    echo "]";
    $sql->close();
    die();
} else {
    $sql->close();
    die();
}
?>