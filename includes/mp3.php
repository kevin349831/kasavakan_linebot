<?php

if (strtolower($message['text']) == "audio" || $message['text'] == "音頻" || $message['text'] == "音樂") {

		$file = fopen('../assets/audios/music.mp3', 'wb');

		$cacheFileName = '../assets/audios/A.mp3';
		$cacheFile     = fopen($cacheFileName, 'rb');
		$content       = fread($cacheFile, filesize($cacheFileName));
		fwrite($file, $content);
		fclose($cacheFile);

		$cacheFileName = '../assets/audios/B.mp3';
		$cacheFile     = fopen($cacheFileName, 'rb');
		$content       = fread($cacheFile, filesize($cacheFileName));
		fwrite($file, $content);
		fclose($cacheFile);

		fclose($file);




    $audiofileurl = 'https://kasavakan-linebot.herokuapp.com/assets/audios/music.mp3'; // 音樂文件網址

    $milliseconds = '1000'; // 音樂長度 (毫秒)

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
