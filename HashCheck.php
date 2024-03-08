<?php
$password = "Whatever";
$password1 = "ThisMattersNot";
$salt = array("thiev");
$hashedPassword = "";

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$hashedPassword1 = password_hash($password, PASSWORD_DEFAULT);
$hashedPassword2 = password_hash($password, PASSWORD_DEFAULT);
$hashedPassword3 = password_hash($password1, PASSWORD_DEFAULT);
$hashedPassword4 = password_hash($password1, PASSWORD_DEFAULT);
$hashedPassword5 = password_hash($password1, PASSWORD_DEFAULT);

echo $hashedPassword."\r\n";
echo $hashedPassword1."\r\n";
echo $hashedPassword2."\r\n";
echo $hashedPassword3."\r\n";
echo $hashedPassword4."\r\n";
echo $hashedPassword5."\r\n";
echo strlen($hashedPassword);
if(password_verify($password, $hashedPassword))
echo "true\r\n";
if(password_verify($password, $hashedPassword1))
echo "true\r\n";
if(password_verify($password, $hashedPassword2))
echo "true\r\n";
if(password_verify($password, $hashedPassword3))
echo "true\r\n";
?>