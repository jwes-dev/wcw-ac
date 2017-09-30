<?php
$headers = apache_request_headers();
$min = date("i");
if(password_verify("SoFar$min"."So$min"."Great", $headers["App-Key"]))
{
    header("Server-Application: ".password_hash("SoFarSoGreat",PASSWORD_DEFAULT));
    echo "Pass";
}
else
{
    echo password_hash("SoFar$min"."So$min"."Great",PASSWORD_DEFAULT);
}

function IsValid()
?>