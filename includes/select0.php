<?php


if ($message['text'] == "DB" || $message['text'] == "資料庫"){
    $theword = '';
    $host        = "host=ec2-100-24-139-146.compute-1.amazonaws.com";
    $port        = "port=5432";
    $dbname      = "dbname=d74b535jl61vqu";
    $credentials = "user=erlewlqwfxroic password=24a136a16b48e1a0e38c616d42af528d8280cdbbb933393dde8fa83da2cee8b0";

    $db = pg_connect( "$host $port $dbname $credentials"  );
    if(!$db){
      $theword = "Error : Unable to open database";
    } else {
      $theword = "Opened database successfully";
    }
    //------DB CONNETC
    $sql =<<<EOF
    SELECT * FROM public.kasavakan_db WHERE ethnic like 'suwan';
    EOF;
    $ret = pg_query($db, $sql);
    if(!$ret){
    echo pg_last_error($db);
    exit;
    }
    while($row = pg_fetch_row($ret)){
    $theword = $theword. "Data1 = ". $row[0] . "";
    $theword = $theword. "Data2 = ". $row[1] ."";
    $theword = $theword. "Data3 = ". $row[2] ."";
    $theword = $theword. "Data4 =  ".$row[3] ."";
    $theword = $theword. "Data5 =  ".$row[4] ."";
    }
    echo "Operation done successfully";
    $theword = $theword."okok";
    pg_close($db);
    //DB SELECT
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
