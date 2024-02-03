<?php 

session_start();
if (!isset($_SESSION["email"])) {
  header("location:../index.php");
}
include("navbar.php");

echo "hi"; ?>