<?php
$HostStr = "102.222.124.11";
$UserNameStr = "rcbriovv_ReynardBrits";
$PasswordStr = "ReynardTech@321";
$DBNameStr = "rcbriovv_Ecommerce";

$conn = new mysqli($HostStr, $UserNameStr, $PasswordStr, $DBNameStr);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

