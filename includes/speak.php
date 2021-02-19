<?php
$NewString = strtolower($message['text']);
$NewCheckWord = str_split($NewString,1); //-word
if (strtolower($NewCheckWord[0]) == ".") { // 檢查是不是-開頭
  //如果第一個字是dash 就把它移除
  $Checkdesh = str_split($NewString,1);
  if($Checkdesh[0] == '.') {
    $NewString = substr($NewString,1,strlen($NewString));
  }
  // 族語拆字
  //$word = strtolower($message['text']);
  $CheckWord = str_split($NewString,1);
  $CheckLen = strlen($NewString);

  $temp = '';
  for ($i=0; $i < $CheckLen; $i++) {//suwan
      if ($CheckWord[$i] == 'a' || $CheckWord[$i] == 'i' || $CheckWord[$i] == 'u' || $CheckWord[$i] == 'o' || $CheckWord[$i] == 'e') {
           // 字尾是母音 或其他地方是母音 直接不作動 等待別人拆字
          if ($CheckWord[$i+1] == 'a' || $CheckWord[$i+1] == 'i' || $CheckWord[$i+1] == 'u' || $CheckWord[$i+1] == 'o' || $CheckWord[$i+1] == 'e') { // 如果重複母音 要拆開 ex: aapat makaanimui
              $temp = $temp . $CheckWord[$i] . '-' . $CheckWord[$i+1];
              $i = $i +1;
          }
          elseif ($i == $CheckLen-2) { //倒數最後第二個字是母音 直接合併最後一個字
              if ($CheckWord[$i+1] == "'"){//如果最後一個是喉塞音 不要改成x再併上去
                  $temp = $temp . $CheckWord[$i] . 'x';
              }
              else{
                  $temp = $temp . $CheckWord[$i] . $CheckWord[$i+1];
              }
              $i = $i + 1;
          }
          else {
              $temp = $temp . $CheckWord[$i];
          }
      }
      //lr
      elseif ($CheckWord[$i] == 'l' && $CheckWord[$i+1] == 'r') {
          if ($i == $CheckLen-2) { //ng 結尾
              if ($CheckWord[$i-1] == "'"){
                  $temp = substr($temp,0,-1);
              }
              $temp = $temp . 'lr';
          }
          elseif ($i == $CheckLen-4) { //ng 倒數第三 ex: maranger nger
              $temp = $temp . '-' . 'lr' . $CheckWord[$i+2] . $CheckWord[$i+3]; // 直接合併 ng + er
              break;
          }
          elseif ($i>0){
            if ($CheckWord[$i+2] != 'a' || $CheckWord[$i+2] != 'i' || $CheckWord[$i+2] != 'u' || $CheckWord[$i+2] != 'o' || $CheckWord[$i+2] != 'e') {
                $temp = $temp . '-' . 'lr';
            }
          }
          else{
            $temp = $temp . $CheckWord[$i] . $CheckWord[$i+1];
          }
          $i = $i + 1;
      }
      //lh
      elseif ($CheckWord[$i] == 'l' && $CheckWord[$i+1] == 'h') {
          if ($i == $CheckLen-2) { //ng 結尾
              if ($CheckWord[$i-1] == "'"){
                  $temp = substr($temp,0,-1);
              }
              $temp = $temp . 'lh';
          }
          elseif ($i == $CheckLen-4) { //ng 倒數第三 ex: maranger nger
              $temp = $temp . '-' . 'lh' . $CheckWord[$i+2] . $CheckWord[$i+3]; // 直接合併 ng + er
              break;
          }
          elseif ($i>0){
            if ($CheckWord[$i+2] != 'a' || $CheckWord[$i+2] != 'i' || $CheckWord[$i+2] != 'u' || $CheckWord[$i+2] != 'o' || $CheckWord[$i+2] != 'e') {
                $temp = $temp . '-' . 'lh';
            }
          }
          else{
            $temp = $temp . $CheckWord[$i] . $CheckWord[$i+1];
          }
          $i = $i + 1;
      }
      //ng
      elseif ($CheckWord[$i] == 'n' && $CheckWord[$i+1] == 'g') {
          if ($i == $CheckLen-2) { //ng 結尾
              if ($CheckWord[$i-1] == "'"){
                  $temp = substr($temp,0,-1);
              }
              $temp = $temp . 'ng';
          }
          elseif ($i == $CheckLen-4) { //ng 倒數第三 ex: maranger nger
            if ($CheckWord[$i+2] != 'a' || $CheckWord[$i+2] != 'i' || $CheckWord[$i+2] != 'u' || $CheckWord[$i+2] != 'o' || $CheckWord[$i+2] != 'e'){//解決dingwa di-ngwa的問題
                $temp = $temp . 'ng' . '-' . $CheckWord[$i+2] . $CheckWord[$i+3] ;
                break;
            }
            else{
              $temp = $temp . '-' . 'ng' . $CheckWord[$i+2] . $CheckWord[$i+3]; // 直接合併 ng + er
              break;
            }
          }
          elseif ($i>0){//kuresangdalr & himiyanghing error != 改成 ==
            if ($CheckWord[$i+2] == 'a' || $CheckWord[$i+2] == 'i' || $CheckWord[$i+2] == 'u' || $CheckWord[$i+2] == 'o' || $CheckWord[$i+2] == 'e') {
                $temp = $temp . '-' .'ng' ;
            }
            else{
                $temp = $temp . '-' .'ng' ;
            }
          }
          else{
            $temp = $temp . $CheckWord[$i] . $CheckWord[$i+1];
          }
          $i = $i + 1;
      }
      // 喉塞音
      elseif ($CheckWord[$i] == "'" || $CheckWord[$i] == "‘" || $CheckWord[$i] == "’" || $CheckWord[$i] == "‘" || $CheckWord[$i] == "`") {
          if ($CheckWord[$i+1] == 'a' || $CheckWord[$i+1] == 'i' || $CheckWord[$i+1] == 'u' || $CheckWord[$i+1] == 'o' || $CheckWord[$i+1] == 'e'){
              $temp = $temp . '-' . 'x' . $CheckWord[$i+1];//如果下一個是母音才可以直接並下去 否則再lre'lre'會發生錯變成 lre-'l-re'
              $i = $i + 1;
          }
          else{
              $temp = $temp . 'x';
          }
      }
      else {
        if ($CheckWord[$i+1] == 'a' || $CheckWord[$i+1] == 'i' || $CheckWord[$i+1] == 'u' || $CheckWord[$i+1] == 'o' || $CheckWord[$i+1] == 'e') {
            $Checkdesh = str_split($temp,1);
            $n = strlen($temp) - 1;//這個宣告在幹嘛用的？？？？？
            $temp = $temp . '-' . $CheckWord[$i];
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
