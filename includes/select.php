<?php


if ($message['text'] == "DB" || $message['text'] == "資料庫"){
    $theword = '';

    $con = "dbname=d74b535jl61vqu host=ec2-100-24-139-146.compute-1.amazonaws.com port=5432 user=erlewlqwfxroic password=24a136a16b48e1a0e38c616d42af528d8280cdbbb933393dde8fa83da2cee8b0 sslmode=require";
    if (!$con)
    {
      $theword = "Database connection failed.";
    }
    else
    {
      $theword = "Database connection success.";
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
