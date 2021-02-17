<?php
$NewString = strtolower($message['text']);
$NewCheckWord = str_split($NewString,1); //.word
if (strtolower($NewCheckWord[0]) == ".") { // 檢查是不是.開頭
  //如果第一個字是. 就把它移除
$word = strtolower($message['text']);
$word = substr($word,1);
// 族語拆字


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
        if ($i == $CheckLen-2) {
            $temp = substr($temp,0,-1);
        }
        $temp = $temp . $CheckWord[$i] . $CheckWord[$i+1];
        $i = $i + 1;
    }
    //lh
    elseif ($CheckWord[$i] == 'l' && $CheckWord[$i+1] == 'h') {
        if ($CheckWord[$i-1] == 'a' || $CheckWord[$i-1] == 'i' || $CheckWord[$i-1] == 'u' || $CheckWord[$i-1] == 'o' || $CheckWord[$i-1] == 'e') {
            $temp = $temp . '-';
        }
        if ($i == $CheckLen-2) {
            $temp = substr($temp,0,-1);
        }
        $temp = $temp .'lr';
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
        $temp = $temp . '-' . $CheckWord[$i] . $CheckWord[$i+1];
        $i = $i + 1;
    }
    else {
        if ($CheckWord[$i+1] == 'a' || $CheckWord[$i+1] == 'i' || $CheckWord[$i+1] == 'u' || $CheckWord[$i+1] == 'o' || $CheckWord[$i+1] == 'e') {
            $Checkdesh = str_split($temp,1);
            $n = strlen($temp) - 1;
            if ($Checkdesh[$n] == '-') { // sinsi 會變成 sin--si 所以要檢查
                //$temp = $temp . $CheckWord[$i];
                $temp = $temp . "'";
            }
            else {
                //$temp = $temp . '-' . $CheckWord[$i];
                $temp = $temp . '-' . "'";
            }
        }
        elseif ($CheckWord[$i-1] == 'a' || $CheckWord[$i-1] == 'i' || $CheckWord[$i-1] == 'u' || $CheckWord[$i-1] == 'o' || $CheckWord[$i-1] == 'e') {
            //$temp = $temp . $CheckWord[$i] . '-';
            $temp = $temp . "'" . '-';
        }
        else {
            //$temp = $temp . $CheckWord[$i];
            $temp = $temp . "'";
        }
    }
}

//如果第一個字是dash 就把它移除
$Checkdesh = str_split($temp,1);
if($Checkdesh[0] == '-') {
  $temp = substr($temp,1,strlen($temp));
}
// $temp 是 拆解完的單字 如：ka-sa-va-kan

//------------上半部-------------是拆字

//--------中間-----將字分開去找聲音
$str_explode = explode("-" , $temp); //用-拆字
$num = count($str_explode); //看拆了幾個字
$new_file_name = "";
$cat_file = "cat ";
for ($i=0; $i < $num; $i++) {//把檔案名字加進去
  $cat_file = $cat_file . "./assets/audios/" . $str_explode[$i] . ".mp3 ";
  $new_file_name = $new_file_name . $str_explode[$i];
}
$cat_file = $cat_file . "> ./assets/audios/" . $new_file_name . ".mp3";
//---------下半部--------是放聲音



      // 用指令合併mp3檔案 可以合併多個
  		//$A = exec('cat ./assets/audios/ka.mp3 ./assets/audios/sa.mp3 ./assets/audios/va.mp3 ./assets/audios/kan.mp3 > ./assets/audios/new.mp3', $output, $return_val);
      $A = exec($cat_file);
  		//播放檔案位置 需要永久固定 因為會直接抓那個檔案來播放
      //$audiofileurl = 'https://kasavakan-linebot.herokuapp.com/assets/audios/new.mp3'; // 音樂文件網址
      $audiofileurl = 'https://kasavakan-linebot.herokuapp.com/assets/audios/' . $new_file_name . '.mp3'; // 音樂文件網址

      $milliseconds = '3000'; // 音樂長度 (毫秒)

      $client->replyMessage(array(
          'replyToken' => $event['replyToken'],
          'messages' => array(
              array(
                  'type' => 'audio', // 訊息類型 (音樂)
                  'originalContentUrl' => $audiofileurl, // 回復音樂
                  'duration' => $milliseconds // 音樂長度 (毫秒)
              )
          )
      ));
}
