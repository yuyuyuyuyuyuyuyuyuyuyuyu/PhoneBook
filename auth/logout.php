<?php
require_once '../domain.php';

session_start();
session_destroy();
// редирект

header('Location: http://'.$domain1.'/pb1/PhoneBook-master-GOOD/PhoneBook-master/index.php');
exit;
?>