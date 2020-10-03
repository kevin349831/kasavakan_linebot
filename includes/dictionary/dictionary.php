<?php

$NewString = strtolower($message['text']);
$NewArr = str_split($NewString,1); //@

$json = file_get_contents('./includes/article/article.json');
# 將 JSON 格式資料轉換為 PHP 物件
$obj = json_decode($json, true);


if (strtolower($NewArr[0]) == "@"){
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'text', // 訊息類型 (文字)
                'text' => 'Hello!@' // 回復訊息
            )
        )
    ));
}
