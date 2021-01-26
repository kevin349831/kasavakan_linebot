<?php

date_default_timezone_set("Asia/Taipei");

require_once('LINEBotTiny.php');

if (file_exists(__DIR__ . '/config.ini')) {
    $config = parse_ini_file("config.ini", true);
    if ($config['Channel']['Token'] == Null || $config['Channel']['Secret'] == Null) {
        error_log("config.ini 配置檔未設定完全！", 0);
    } else {
        $channelAccessToken = $config['Channel']['Token'];
        $channelSecret = $config['Channel']['Secret'];
    }
} else {
    $configFile = fopen("config.ini", "w") or die("Unable to open file!");
    $configFileContent = '
[Channel]
; 請在雙引號內輸入您的 Line Bot "Channel access token"
Token = "JOca01SvcdiMVqb00f2BoszJaOV5+PxBUY/jnTV3oTW9dA/0bp5luZs+OMvt76r1dYcEntyosXcr2xhUhWdOd67bEzikTSNeNCX/uHGUWKnUPthkjTAj0lJ0mkQsNbDlpTFpy7MHreiuKN1boC8rTwdB04t89/1O/w1cDnyilFU="

; 請在雙引號內輸入您的 Line Bot "Channel secret"
Secret = "773d13c1e46482d3212290f29466c9ec"
';
    fwrite($configFile, $configFileContent); // 建立文件並寫入
    fclose($configFile); // 關閉文件
    error_log("config.ini 配置檔建立成功，請編輯檔案填入資料！", 0); // 輸出錯誤
}

$message = null;
$event = null;

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
                    require_once('includes/database');
                    require_once('includes/ninestage/newbook.php');
                    require_once('includes/ninestage/selectstage.php'); //選擇九階課本 ok
                    require_once('includes/ninestage/selectlesson.php'); //選擇第幾課 ok
                    require_once('includes/ninestage/readbook.php'); //看課文 ok

                    require_once('includes/speak.php');
                    require_once('includes/mp3.php');//傳聲音
                    require_once('includes/dictionary/dictionary.php');//查單字

                    require_once('includes/article/article.php'); // 看文章 還沒做
                    require_once('includes/library/library.php'); //
                    require_once('includes/split.php');// 拆字


                    //require_once('includes/any.php');
                    break;
                default:
                    //error_log("Unsupporeted message type: " . $message['type']);
                    break;
            }
            break;
        case 'postback':
            //require_once('postback.php'); // postback
            break;
        case 'follow': // 加為好友觸發
            $client->replyMessage(array(
                'replyToken' => $event['replyToken'],
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => "'inava u diya.
a 族語小幫手 ku ngadan.
sayhu ku marengay nanta nagi kana kasavakan."
                    )
                )
            ));
            break;
        case 'join': // 加入群組觸發
            $client->replyMessage(array(
                'replyToken' => $event['replyToken'],
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => "'inava u diya.
a 族語好好玩 ku ngadan.
sayhu ku rengay da nanta ngai na kasavakan."
                    )
                )
            ));
            break;
        default:
            //error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
}
