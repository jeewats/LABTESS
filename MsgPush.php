<?php
header('Access-Control-Allow-Origin: *');
if($_SERVER['REQUEST_METHOD'] == "POST")
{ $imsg = $_POST['msg'];
   $accessToken = "nvKxWFmgwTVFM2Xs2a6dNfO2myEOUZe8hieYkUgAF2MSlSZ+ZMPT/HQMIaUwoXBF86przIhx1a5BlEmgglpIIihe/bxvsJ0FPuSn0gR0QpFQWeVR6Rt0IVpbLLpGGK6fXe63uX0pPd0sJUcLS5VchAdB04t89/1O/w1cDnyilFU=";//copy ข้อความ Channel access token ตอนที่ตั้งค่า
   $content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";
   //รับข้อความจากผู้ใช้
   //$message = $arrayJson['events'][0]['message']['text'];
   //รับ id ของผู้ใช้
   $id = "U4a1909948875aed4b6c5177c13902f9a";
   $arrayPostData['to'] = $id;
   $arrayPostData['messages'][0]['type'] = "text"
   $arrayPostData['messages'][0]['text'] = $imsg;
   pushMsg($arrayHeader,$arrayPostData);
   if($message == "นับ 1-10"){
       for($i=1;$i<=10;$i++){
          $arrayPostData['to'] = $id;
          $arrayPostData['messages'][0]['type'] = "text";
          $arrayPostData['messages'][0]['text'] = $i;
          pushMsg($arrayHeader,$arrayPostData);
       }
    }
}
   function pushMsg($arrayHeader,$arrayPostData){
      $strUrl = "https://api.line.me/v2/bot/message/push";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
   }
   exit;
?>
