<?php


if ($message['text'] == "SQ" || $message['text'] == "sq"){
    $theword = '';
    class SQLiteDB extends SQLite3{
        function __construct(){
           $this->open('savak.db');
        }
     }
     $db = new SQLiteDB();
     if(!$db){
        $theword = $db->lastErrorMsg();
     } else {
        $theword = "Yes, Opened database successfully";
     }


    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'text', // 訊息類型 (文字)
                'text' => 'SQ文字：'.$theword // 回復訊息
            )
        )
    ));
}
