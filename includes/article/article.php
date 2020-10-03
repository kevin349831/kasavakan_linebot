<?php

$json = file_get_contents('./includes/article/article.json');
# 將 JSON 格式資料轉換為 PHP 物件
$obj = json_decode($json, true);
# 檢視結果
$newa = $obj[0]["title"] . " - " . $obj[0]["author"] . '
' . '
' . $obj[0]["aboriginal"] . '
' . '
' . $obj[0]["chinese"];
if (strtolower($message['text']) == "article" || $message['text'] == "文章"){
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'text', // 訊息類型 (文字)
                'text' => $newa // 回復訊息
            )
        )
    ));
}
