<?php

// 族語拆字
$word = strtolower($message['text']);
$CheckWord = str_split($word,1);
$CheckLen = strlen($word);
$temp = '';
for ($i=0; $i < $CheckLen; $i++) {//suwan
    if ($CheckWord[$i] == 'a' || $CheckWord[$i] == 'i' || $CheckWord[$i] == 'u' || $CheckWord[$i] == 'o' || $CheckWord[$i] == 'e') {
         // 字尾是母音 或其他地方是母音 直接不作動 等待別人拆字
        if ($CheckWord[$i+1] == 'a' || $CheckWord[$i+1] == 'i' || $CheckWord[$i+1] == 'u' || $CheckWord[$i+1] == 'o' || $CheckWord[$i+1] == 'e') { // 如果重複母音 要拆開 ex: aapat makaanimui
            $temp = $temp . $CheckWord[$i] . '-' . $CheckWord[$i+1];
            $i = $i +1;
        }
        elseif ($i == $CheckLen-2) { //倒數最後第二個字是母音 直接合併最後一個字
            $temp = $temp . $CheckWord[$i] . $CheckWord[$i+1];
            $i = $i + 1;
        }
        else {
            $temp = $temp . $CheckWord[$i];
        }
    }
    //lr
    elseif ($CheckWord[$i] == 'l' && $CheckWord[$i+1] == 'r') {
        if ($CheckWord[$i-1] == 'a' || $CheckWord[$i-1] == 'i' || $CheckWord[$i-1] == 'u' || $CheckWord[$i-1] == 'o' || $CheckWord[$i-1] == 'e') {
            $temp = $temp . '-';
        }
        $temp = $temp . $CheckWord[$i] . $CheckWord[$i+1];
        $i = $i + 1;
    }
    //lh
    elseif ($CheckWord[$i] == 'l' && $CheckWord[$i+1] == 'h') {
        if ($CheckWord[$i-1] == 'a' || $CheckWord[$i-1] == 'i' || $CheckWord[$i-1] == 'u' || $CheckWord[$i-1] == 'o' || $CheckWord[$i-1] == 'e') {
            $temp = $temp . '-';
        }
        $temp = $temp . $CheckWord[$i] . $CheckWord[$i+1];
        $i = $i + 1;
    }
    //ng
    elseif ($CheckWord[$i] == 'n' && $CheckWord[$i+1] == 'g') {
        if ($CheckWord[$i-1] == 'a' || $CheckWord[$i-1] == 'i' || $CheckWord[$i-1] == 'u' || $CheckWord[$i-1] == 'o' || $CheckWord[$i-1] == 'e') {
            $temp = $temp . '-';
        }
        if ($i == $CheckLen-2) { //ng 結尾
            $temp = substr($temp,0,-1);
        }
        $temp = $temp . $CheckWord[$i] . $CheckWord[$i+1];
        $i = $i + 1;
    }
    // 喉塞音
    elseif ($CheckWord[$i] == "'" || $CheckWord[$i] == "‘" || $CheckWord[$i] == "’" || $CheckWord[$i] == "‘" || $CheckWord[$i] == "`") {
        $temp = $temp . '-' . $CheckWord[$i] . $word[$i+1];
        $i = $i + 1;
    }
    else {
        if ($CheckWord[$i+1] == 'a' || $CheckWord[$i+1] == 'i' || $CheckWord[$i+1] == 'u' || $CheckWord[$i+1] == 'o' || $CheckWord[$i+1] == 'e') {
            $Checkdesh = str_split($temp,1);
            $n = strlen($temp) - 1;
            if ($Checkdesh[$n] == '-') { // sinsi 會變成 sin--si 所以要檢查
                $temp = $temp . $CheckWord[$i];
            }
            else {
                $temp = $temp . '-' . $CheckWord[$i];
            }
        }
        elseif ($CheckWord[$i-1] == 'a' || $CheckWord[$i-1] == 'i' || $CheckWord[$i-1] == 'u' || $CheckWord[$i-1] == 'o' || $CheckWord[$i-1] == 'e') {
            $temp = $temp . $CheckWord[$i] . '-';
        }
        else {
            $temp = $temp . $CheckWord[$i];
        }
    }
}

//如果第一個字是dash 就把它移除

$Checkdesh = str_split($temp,1);
if($Checkdesh[0] == '-') {
  $temp = substr($temp,1,strlen($temp));
}

if (true){
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'text', // 訊息類型 (文字)
                'text' => '音節拆解 -> ' . '
' . $temp  // 回復訊息
            )
        )
    ));
}
