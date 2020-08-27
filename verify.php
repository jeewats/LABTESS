<?php 
  $access_token = 'nvKxWFmgwTVFM2Xs2a6dNfO2myEOUZe8hieYkUgAF2MSlSZ+ZMPT/HQMIaUwoXBF86przIhx1a5BlEmgglpIIihe/bxvsJ0FPuSn0gR0QpFQWeVR6Rt0IVpbLLpGGK6fXe63uX0pPd0sJUcLS5VchAdB04t89/1O/w1cDnyilFU=';
  $url = 'https://api.line.me/v1/oauth/verify';
  $headers = array('Authorization: Bearer ' . $access_token);
  $ch = curl_init($url);curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  $result = curl_exec($ch);curl_close($ch);
  echo $result;
