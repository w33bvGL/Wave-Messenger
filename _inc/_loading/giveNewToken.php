<?php
use Firebase\JWT\JWT;

function newAccessToken($userId, $connect)
{
  $timezone = getClientTimezone($userId, $connect);
  $userInfo = getClientUserInformation($userId, $connect);

  $userData['timezone'] = json_decode($timezone['clientTimezone'], true);
  $userData['userInfo'] = $userInfo;

  $accessTokenExp = time() + 3600;
  $algorithm = 'HS256';

  $accessTokenData = array(
    'timezone' => $userData['timezone'],
    'id' => $userData['userInfo']['id'],
    'username' => $userData['userInfo']['username'],
    'email' => $userData['userInfo']['email'],
    'firstName' => $userData['userInfo']['firstName'],
    'lastName' => $userData['userInfo']['lastName'],
    'exp' => $accessTokenExp
  );

  $accessToken = JWT::encode($accessTokenData, 'xQ@7Hv$3rLp*Ew#2NcG%m9F5sD8aZ^1R!4TbY6UjW&5tC^0g', $algorithm);
  return $accessToken;
}

function newRefreshToken($userId, $connect)
{
  $refresh = bin2hex(random_bytes(20));
  $algorithm = 'HS256';
  $newExpRefreshToken = time() + (30 * 24 * 60 * 60);
  $userInfo = getClientUserInformation($userId, $connect);
  $userData['userInfo'] = $userInfo;

  $refreshTokenData = array(
    'refresh' => $refresh,
    'id' => $userData['userInfo']['id'],
    'exp' => $newExpRefreshToken
  );

  $refreshToken = JWT::encode($refreshTokenData, 'bK#3FtN7aR!4TgY6UjW&5xD8vQ@2HcE$9WmZ^1Lp*Sw@7X^0', $algorithm);
  return $refreshToken;
}

function getClientTimezone($userId, $connect)
{
  $query = "SELECT clientTimezone FROM usersInfo WHERE userId = :userId";
  $stmt = $connect->prepare($query);
  $stmt->bindParam(':userId', $userId);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return $result;
}

function getClientUserInformation($userId, $connect)
{
  $query = "SELECT id, username, email, firstName, lastName FROM users WHERE id = :userId";
  $stmt = $connect->prepare($query);
  $stmt->bindParam(':userId', $userId);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return $result;
}
