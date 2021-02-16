<?php


if ($message['text'] == "DB" || $message['text'] == "資料庫"){
    $theword = '';
    
    $host        = "ec2-100-24-139-146.compute-1.amazonaws.com";
    $port        = "port=5432";
    $dbname      = "dbname=d74b535jl61vqu";
    $credentials = "user=erlewlqwfxroic password=24a136a16b48e1a0e38c616d42af528d8280cdbbb933393dde8fa83da2cee8b0";

    $db = pg_connect( "$host $port $dbname $credentials"  );
    if(!$db){
       $theword = "Error : Unable to open database";
    } else {
       $theword = "Opened database successfully";
    }
    //--------------DB


    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'text', // 訊息類型 (文字)
                'text' => 'postgresql 文字：'.$theword // 回復訊息
            )
        )
    ));
}
