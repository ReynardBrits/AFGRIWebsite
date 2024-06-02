<?php
$HostStr = "102.222.124.11";
$UserNameStr = "rcbriovv_ReynardBrits";
$PasswordStr = "ReynardTech@321";
$DBNameStr = "rcbriovv_Ecommerce";

$DBConnectObj = new mysqli($HostStr, $UserNameStr, $PasswordStr, $DBNameStr);


if ($DBConnectObj->connect_error) {
    die("Connection failed: " . $DBConnectObj->connect_error);
}
?>