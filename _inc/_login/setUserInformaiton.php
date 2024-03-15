<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use WhichBrowser\Parser;

function setUserInformation($userId, $connect)
{
  $parser = new Parser($_SERVER['HTTP_USER_AGENT']);
  //ip info site token!
  $token = "54e01fc2675dcc";
  $ipAddress = getClientIP($token);
  $userAgent = $_SERVER['HTTP_USER_AGENT'];
  $operationSystem = $parser->os->toString();
  $browser = $parser->browser->toString();
  $clientTimezone = getClientTimezone($token);

  $query = "INSERT INTO usersInfo (userId, ipAddress, userAgent, operatingSystem, browser, clientTimezone) 
              VALUES (:userId, :ipAddress, :userAgent, :operatingSystem, :browser, :clientTimezone)";

  $stmt = $connect->prepare($query);
  $stmt->bindParam(':userId', $userId);
  $stmt->bindParam(':ipAddress', $ipAddress);
  $stmt->bindParam(':userAgent', $userAgent);
  $stmt->bindParam(':operatingSystem', $operationSystem);
  $stmt->bindParam(':browser', $browser);
  $stmt->bindParam(":clientTimezone", $clientTimezone);

  $stmt->execute();
  $lastInsertedId = $connect->lastInsertId();
  setUserIpInfo($token, $connect, $lastInsertedId);

}

function setUserIpInfo($token, $connect, $lastInsertedId)
{
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, "https://ipinfo.io/?token={$token}");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $response = curl_exec($ch);

  curl_close($ch);
  $data = json_decode($response, true);
  $stmt = $connect->prepare("SELECT id FROM usersInfo WHERE id = :userId");
  $stmt->bindParam(':userId', $lastInsertedId);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $user = $result['id'];

  $city = $data['city'];
  $region = $data['region'];
  $country = $data['country'];
  $loc = $data['loc'];
  $companyName = $data['company']['name'];

  $query = "INSERT INTO usersIpInfo (userId, city, region, country, location, providerCompanyName ) VALUES (:userId, :city, :region, :country, :location, :companyName )";
  $stmt = $connect->prepare($query);

  $stmt->bindParam(':userId', $user);
  $stmt->bindParam(':city', $city);
  $stmt->bindParam(':region', $region);
  $stmt->bindParam(':country', $country);
  $stmt->bindParam(':location', $loc);
  $stmt->bindParam(':companyName', $companyName);
  $stmt->execute();
}

function getClientIP($token)
{
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, "https://ipinfo.io/?token={$token}");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $response = curl_exec($ch);

  curl_close($ch);
  $data = json_decode($response, true);
  return $data['ip'];
}

function getClientTimezone($token)
{
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, "https://ipinfo.io/?token={$token}");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $response = curl_exec($ch);

  curl_close($ch);
  $data = json_decode($response, true);
  return $data['timezone'];
}




