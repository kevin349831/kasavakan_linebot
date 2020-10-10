<?php


//$url = 'https://5905411752d6.ngrok.io/assets/images/ninestagepic/'; // ngrok 重開就要更改
$url = 'https://kasavakan-linebot.herokuapp.com/assets/images/ninestagepic/';
$NewString = strtolower($message['text']);

if (strlen($NewString) == 7) {
    $BookPage = substr($NewString,-5,5); // ex: st1-1-1 只取 1-1-1
}
else {
    $BookPage = substr($NewString,-6,6); // ex: st1-1-1 只取 1-1-1
}

$Arr = str_split($NewString,1);
$CheckPage = substr($NewString,-1,1) + 1; //最後一個字+1
$NextStage = '';
$NextPage = '';
$PrevStage = 'ls1-1-';
$PrevPage = '1';
switch ($CheckPage) {//st 1 - 5 - 1
  case '2':
    if (strlen($NewString) == 7) { //st1-1-1 st5-1-1
        $NextStage = $Arr[0] . $Arr[1] . $Arr[2] . $Arr[3] . $Arr[4] . $Arr[5];
        $NextPage = $Arr[6] + 1;
        if ($Arr[4] == '1') {
            $PrevStage = '沒有上一頁';
            $PrevPage = '';
        }
        else {
            $Arr[4] = $Arr[4] - 1;
            $PrevStage = $Arr[0] . $Arr[1] . $Arr[2] . $Arr[3] . $Arr[4] . $Arr[5];
            $PrevPage = '3';
        }
    }
    else { //st1-10-3
        $NextStage = $Arr[0] . $Arr[1] . $Arr[2] . $Arr[3] . $Arr[4] . $Arr[5] . $Arr[6];
        $NextPage = $Arr[7] + 1; //有問題
    }
    break;
  case '3':
    if (strlen($NewString) == 7) {
        $NextStage = $Arr[0] . $Arr[1] . $Arr[2] . $Arr[3] . $Arr[4] . $Arr[5];
        $NextPage = $Arr[6] + 1;
        $PrevStage = $Arr[0] . $Arr[1] . $Arr[2] . $Arr[3] . $Arr[4] . $Arr[5];
        $PrevPage = '1';
    }
    else {
        $NextStage = $Arr[0] . $Arr[1] . $Arr[2] . $Arr[3] . $Arr[4] . $Arr[5] . $Arr[6];
        $NextPage = $Arr[7] + 1;
        $PrevStage = $Arr[0] . $Arr[1] . $Arr[2] . $Arr[3] . $Arr[4] . $Arr[5] . $Arr[6];
        $PrevPage = '1';
    }
    break;
  case '4':
      if ($Arr[4].$Arr[5] == '10') {
          $NextStage = '沒有下一頁了';
          $NextPage = '';
          $Arr[4] = $Arr[4] - 1;
          $PrevStage = $Arr[0] . $Arr[1] . $Arr[2] . $Arr[3] . '10-';
          $PrevPage = '2';
      }
      else {
          $Arr[4] = $Arr[4] + 1;
          $NextStage = $Arr[0] . $Arr[1] . $Arr[2] . $Arr[3] . $Arr[4] . $Arr[5];
          $NextPage = '1';
          $Arr[4] = $Arr[4] - 1;
          $PrevStage = $Arr[0] . $Arr[1] . $Arr[2] . $Arr[3] . $Arr[4] . $Arr[5];
          $PrevPage = '2';
      }
    break;
  default:
    // code...
    break;
}
//接收 ls3-1
if (strtolower($message['text']) == "ls" || $NewArr[0] == "ls"){
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'imagemap', // 訊息類型 (圖片地圖)
                'baseUrl' => $url.$BookPage.'.jpg#', // 圖片網址 (可調整大小 240px, 300px, 460px, 700px, 1040px)
                'altText' => 'Example imagemap', // 替代文字
                'baseSize' => array(
                    'height' => 1600, // 圖片高
                    'width' => 1040 // 圖片寬
                ),
                'actions' => array(
                    array(
                        'type' => 'message', // 類型 (用戶發送訊息)
                        'text' => $PrevStage . $PrevPage, // 發送訊息
                        'area' => array(
                            'x' => 0, // 點擊位置 X 軸
                            'y' => 0, // 點擊位置 Y 軸
                            'width' => 520, // 點擊範圍寬度
                            'height' => 1600 // 點擊範圍高度
                        )
                    ),
                    array(
                        'type' => 'message', // 類型 (用戶發送訊息)
                        'text' => $NextStage . $NextPage,
                        //'text' => 'ls'.$NewPage1.$NewPage2, // 發送訊息
                        'area' => array(
                            'x' => 520, // 點擊位置 X 軸
                            'y' => 0, // 點擊位置 Y 軸
                            'width' => 520, // 點擊範圍寬度
                            'height' => 1600 // 點擊範圍高度
                        )
                    )
                )
            )
        )
    ));
}
