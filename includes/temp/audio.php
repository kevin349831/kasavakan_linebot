<?php

if (strtolower($message['text']) == "audio" || $message['text'] == "音頻" || $message['text'] == "音樂") {

    $audiofileurl = 'https://kasavakan-linebot.herokuapp.com/assets/audios/a.ogg'; // 音樂文件網址

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
