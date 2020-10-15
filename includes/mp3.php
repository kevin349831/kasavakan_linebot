<?php

if (strtolower($message['text']) == "audio" || $message['text'] == "音頻" || $message['text'] == "音樂") {
		// 用指令合併mp3檔案 可以合併多個
		$A = exec('cat ./assets/audios/A.mp3 ./assets/audios/A.mp3 > ./assets/audios/new.mp3', $output, $return_val);
		//播放檔案位置 需要永久固定 因為會直接抓那個檔案來播放
    $audiofileurl = 'https://kasavakan-linebot.herokuapp.com/assets/audios/sa.mp3'; // 音樂文件網址

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
