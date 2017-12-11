<?php
  include_once('../database/user.php');
  include_once('../config/init.php');

  global $conn;

  $username = $_POST['username'];

  $password = $_POST['password'];

  $age = $_POST['age'];

  $gender = $_POST['gender'];

  $country = $_POST['country'];

  $email = $_POST['email'];

  
  $result = createUser($username, $password, $age, $gender, $country, $email); 

  header("Location: ../pages/home.php");