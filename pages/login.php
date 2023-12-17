<?php
session_start();

$username = $_POST["email"];
$propPassword = $_POST["password"];

$propPasswordHash = md5($propPassword);

$sqlCon = mysqli_connect("127.0.0.1", "root", "");

if ($sqlCon->mysql_errno)
{
    exit();
}

mysqli_select_db($sqlCon, "portfolio");

$sqlCom = "SELECT * FROM logins";
$sqlUsrQuery = mysqli_query($sqlCon, $sqlCom);

$sqlUsrRecord = mysqli_fetch_array($sqlUsrQuery);

if ($sqlUsrRecord["hashedPassword"] == $propPasswordHash)
{
    $_SESSION["auth"] = true;
    $_SESSION["username"] = $sqlUsrRecord["username"];
    header("Location: /");
}

print_r($sqlUsrRecord["hashedPassword"] == $propPasswordHash);
print_r($sqlUsrRecord["username"]);


?>