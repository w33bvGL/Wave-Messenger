<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function openJWT($URL, $connect)
{
  $refreshToken = $_SESSION['refresh_token'];
  if (!empty($refreshToken)) {
    $accessSecret = 'xQ@7Hv$3rLp*Ew#2NcG%m9F5sD8aZ^1R!4TbY6UjW&5tC^0g';
    $refreshSecret = 'bK#3FtN7aR!4TgY6UjW&5xD8vQ@2HcE$9WmZ^1Lp*Sw@7X^0';

    if (empty($_COOKIE['access_token'])) {
      $decodedRefreshToken = JWT::decode($refreshToken, new Key($refreshSecret, 'HS256'));
      $expRefreshToken = $decodedRefreshToken->exp;
      if ($expRefreshToken <= time()) {
        logout();
        return null;
      } else {
        $userId = $decodedRefreshToken->id;
        $newAccessToken = newAccessToken($userId, $connect);
        $newRefreshToken = newRefreshToken($userId, $connect);

        setcookie('access_token', $newAccessToken, time() + 3600, '/', $URL, false, false);
        
        // decode new token
        $decodedNewAccessToken = JWT::decode($newAccessToken, new Key($accessSecret, 'HS256'));
       
        $_SESSION['refresh_token'] = $newRefreshToken;
        return $decodedNewAccessToken;
      }
    } else {
      try {
        $accessToken = $_COOKIE['access_token'];
        
        $decodedAccessToken = JWT::decode($accessToken, new Key($accessSecret, 'HS256'));
        // print_r($decodedAccessToken);
        return $decodedAccessToken;
        // $expAccessToken = $decodedAccessToken->exp;
          
      } catch (Exception $e) {
          $decodedRefreshToken = JWT::decode($refreshToken, new Key($refreshSecret, 'HS256'));
          $expRefreshToken = $decodedRefreshToken->exp;
          if ($expRefreshToken <= time()) {
            logout();
            return null;
          } else {
            $userId = $decodedAccessToken->id;
            $newAccessToken = newAccessToken($userId, $connect);
            $newRefreshToken = newRefreshToken($userId, $connect);

            setcookie('access_token', $newAccessToken, time() + 3600, '/', $URL, false, false);

            // decode new token
            $decodedNewAccessToken = JWT::decode($newAccessToken, new Key($accessSecret, 'HS256'));
            
            //setcookie('refresh_token', $refreshToken, $newExpRefreshToken, '/', $URL, false, false);
            $_SESSION['refresh_token'] = $newRefreshToken;
            return $decodedNewAccessToken;
          }
      }
    }
  } else {
    logout();
    return "logout user!";
  }
}