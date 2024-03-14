<?php
session_start();
require_once __DIR__ . '/../../vendor/autoload.php';
require_once '../connect.php';
use Firebase\JWT\JWT;

$userData = json_decode(file_get_contents('php://input'), true);

$accessTokenExp = time() + 3600;
$refreshTokenExp = time() + (30 * 24 * 60 * 60);

$refresh = bin2hex(random_bytes(20));
$algorithm = 'HS256';

$userData['timezone'] = json_decode($userData['timezone'], true);
$userData['userInfo'] = json_decode($userData['userInfo'], true);

$accessTokenData = array(
  'timezone' => $userData['timezone']['clientTimezone'],
  'id' => $userData['userInfo']['id'],
  'username' => $userData['userInfo']['username'],
  'email' => $userData['userInfo']['email'],
  'firstName' => $userData['userInfo']['firstName'],
  'lastName' => $userData['userInfo']['lastName'],
  'exp' => $accessTokenExp
);

$refreshTokenData = array(
  'refresh' => $refresh,
  'id' => $userData['userInfo']['id'],
  'exp' => $refreshTokenExp
);

// Access Token
$accessToken = JWT::encode($accessTokenData, 'xQ@7Hv$3rLp*Ew#2NcG%m9F5sD8aZ^1R!4TbY6UjW&5tC^0g', $algorithm);

// Refresh Token
$refreshToken = JWT::encode($refreshTokenData, 'bK#3FtN7aR!4TgY6UjW&5xD8vQ@2HcE$9WmZ^1Lp*Sw@7X^0', $algorithm);

// http only = true |  secure  = false
setcookie('access_token', $accessToken, 0, '/', $URL, false, false);
//setcookie('refresh_token', $refreshToken, time() + (30 * 24 * 60 * 60), '/', $URL, false, false);
$_SESSION['refresh_token'] = $refreshToken;

// JSON response refreshToken for localstorage
//echo json_encode(array('refreshToken' => $refreshToken));

