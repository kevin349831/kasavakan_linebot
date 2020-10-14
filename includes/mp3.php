<?php

if (strtolower($message['text']) == "audio" || $message['text'] == "音頻" || $message['text'] == "音樂") {
/*
		file_put_contents('../assets/audios/combined.mp3',
		file_get_contents('../assets/audios/A.mp3') .
		file_get_contents('../assets/audios/B.mp3'));

		$file = fopen('../assets/audios/combined.mp3', 'wb');
		for ($a = 0; $a < $num; $a++) {
		    $cacheFileName = '../assets/audios/file/A.mp3';
		    $cacheFile     = fopen($cacheFileName, 'rb');
		    $content       = fread($cacheFile, filesize($cacheFileName));
		    fwrite($file, $content);
		    fclose($cacheFile);
		    unlink($cacheFileName);
		}
				fclose($file);
		*/
		//system("ls", $return_var);
		//exec('ls', $output, $return_val);
	$A = exec('cat ./assets/audios/A.mp3 ./assets/audios/A.mp3 > ./assets/audios/new.mp3', $output, $return_val);
	//	$last_line = system('cat A.mp3 A.mp3 > new.mp3', $return_var);



    $audiofileurl = 'https://kasavakan-linebot.herokuapp.com/assets/audios/A.mp3'; // 音樂文件網址

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
