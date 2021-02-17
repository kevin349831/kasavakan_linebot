<?php

$NewString = strtolower($message['text']);
$NewCheckWord = str_split($NewString,1);
if (strtolower($NewCheckWord[0]) == "-") {
  $Checkdesh = str_split($NewString,1);
  if($Checkdesh[0] == '-') {
    $NewString = substr($NewString,1,strlen($NewString));
  }
  $CheckWord = str_split($NewString,1);
  $CheckLen = strlen($NewString);
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
          $temp = $temp . $CheckWord[$i] . $CheckWord[$i+1];
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
  $Checkdesh = str_split($temp,1);
  if($Checkdesh[0] == '-') {
    $temp = substr($temp,1,strlen($temp));
  }
  if (true){
      $client->replyMessage(array(
          'replyToken' => $event['replyToken'],
          'messages' => array(
              array(
                  'type' => 'text',
                  'text' => '音節拆解 -> ' . '
  ' . $temp
              )
          )
      ));
  }
}
