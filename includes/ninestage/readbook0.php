<?php

$url = 'https://kasavakan-linebot.herokuapp.com/assets/images/ninestagepic/';
$NewString = strtolower($message['text']);
if (strlen($NewString) == 7) {
    $BookPage = substr($NewString,-5,5);
}
else {
    $BookPage = substr($NewString,-6,6);
}
$Arr = str_split($NewString,1);
$CheckPage = substr($NewString,-1,1) + 1;
$NextStage = '';
$NextPage = '';
$PrevStage = 'ls1-1-';
$PrevPage = '1';
switch ($CheckPage) {
  case '2':
    if (strlen($NewString) == 7) {
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
    else {
        $NextStage = $Arr[0] . $Arr[1] . $Arr[2] . $Arr[3] . $Arr[4] . $Arr[5] . $Arr[6];
        $NextPage = $Arr[7] + 1;
        $PrevStage = $Arr[0] . $Arr[1] . $Arr[2] . $Arr[3] . '9'. $Arr[6];
        $PrevPage = '3';
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
    break;
}

if (strtolower($message['text']) == "ls" || $NewArr[0] == "ls"){
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'imagemap',
                'baseUrl' => $url.$BookPage.'.jpg#',
                'altText' => 'Example imagemap',
                'baseSize' => array(
                    'height' => 1600,
                    'width' => 1040
                ),
                'actions' => array(
                    array(
                        'type' => 'message',
                        'text' => $PrevStage . $PrevPage,
                        'area' => array(
                            'x' => 0,
                            'y' => 0,
                            'width' => 520,
                            'height' => 1600
                        )
                    ),
                    array(
                        'type' => 'message',
                        'text' => $NextStage . $NextPage,
                        'area' => array(
                            'x' => 520,
                            'y' => 0,
                            'width' => 520,
                            'height' => 1600
                        )
                    )
                )
            )
        )
    ));
}
