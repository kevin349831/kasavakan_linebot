<?php
$NewString = strtolower($message['text']);
$NewCheckWord = str_split($NewString,1);
if (strtolower($NewCheckWord[0]) == ".") {
    $word = strtolower($message['text']);
    $word = substr($word,1);
    $CheckWord = str_split($word,1);
    $CheckLen = strlen($word);
    $temp = '';
    for ($i=0; $i < $CheckLen; $i++) {
        if ($CheckWord[$i] == 'a' || $CheckWord[$i] == 'i' || $CheckWord[$i] == 'u' || $CheckWord[$i] == 'o' || $CheckWord[$i] == 'e') {
            if ($CheckWord[$i+1] == 'a' || $CheckWord[$i+1] == 'i' || $CheckWord[$i+1] == 'u' || $CheckWord[$i+1] == 'o' || $CheckWord[$i+1] == 'e') {
                $temp = $temp . $CheckWord[$i] . '-' . $CheckWord[$i+1];
                $i = $i +1;
            }
            elseif ($i == $CheckLen-2) {
                $temp = $temp . $CheckWord[$i] . $CheckWord[$i+1];
                $i = $i + 1;
            }
            else {
                $temp = $temp . $CheckWord[$i];
            }
        }
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
        elseif ($CheckWord[$i] == 'n' && $CheckWord[$i+1] == 'g') {
            if ($CheckWord[$i-1] == 'a' || $CheckWord[$i-1] == 'i' || $CheckWord[$i-1] == 'u' || $CheckWord[$i-1] == 'o' || $CheckWord[$i-1] == 'e') {
                $temp = $temp . '-';
            }
            if ($i == $CheckLen-2) {
                $temp = substr($temp,0,-1);
            }
            $temp = $temp . $CheckWord[$i] . $CheckWord[$i+1];
            $i = $i + 1;
        }
        elseif ($CheckWord[$i] == "'" || $CheckWord[$i] == "‘" || $CheckWord[$i] == "’" || $CheckWord[$i] == "‘" || $CheckWord[$i] == "`") {
            $temp = $temp . '-' . $CheckWord[$i] . $word[$i+1];
            $i = $i + 1;
        }
        else {
            if ($CheckWord[$i+1] == 'a' || $CheckWord[$i+1] == 'i' || $CheckWord[$i+1] == 'u' || $CheckWord[$i+1] == 'o' || $CheckWord[$i+1] == 'e') {
                $Checkdesh = str_split($temp,1);
                $n = strlen($temp) - 1;
                if ($Checkdesh[$n] == '-') {
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
}
$Checkdesh = str_split($temp,1);
if($Checkdesh[0] == '-') {
  $temp = substr($temp,1,strlen($temp));
}
//------------上半部-------------是拆字

//--------中間-----將字分開去找聲音
$str_explode = explode("-" , $temp);
$num = count($str_explode);
$new_file_name = "";
$cat_file = "cat ";
for ($i=0; $i < $num; $i++) {
  $cat_file = $cat_file . "./assets/audios/" . $str_explode[$i] . ".mp3 ";
  $new_file_name = $new_file_name . $str_explode[$i];
}
$cat_file = $cat_file . "> ./assets/audios/" . $new_file_name . ".mp3";
//---------下半部--------是放聲音
$A = exec($cat_file);
$audiofileurl = 'https://kasavakan-linebot.herokuapp.com/assets/audios/' . $new_file_name . '.mp3';
$milliseconds = '3000';
$client->replyMessage(array(
    'replyToken' => $event['replyToken'],
    'messages' => array(
        array(
            'type' => 'audio',
            'originalContentUrl' => $audiofileurl,
                  'duration' => $milliseconds
        )
    )
  ));
}
