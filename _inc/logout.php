<?php
function logout()
{
  setcookie('access_token', '', 0, '/');
  session_start();
  $_SESSION = array();
  session_destroy();
  //header('location: welcome.php');
}