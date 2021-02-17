<?php


if ($message['text'] == "DB" || $message['text'] == "資料庫"){

    //------------DB
    $host = '210.240.162.61';
    //改成你登入phpmyadmin帳號
    $user = 'savak999';
    //改成你登入phpmyadmin密碼
    $passwd = 'savak999';
    //資料庫名稱
    $database = 'savak999_DB';
    //實例化mysqli(資料庫路徑, 登入帳號, 登入密碼, 資料庫)
    $connect = new mysqli($host, $user, $passwd, $database);

    if ($connect->connect_error) {
        die("連線失敗: " . $connect->connect_error);
    }
    echo "連線成功";

    //設定連線編碼，防止中文字亂碼
    $connect->query("SET NAMES 'utf8'");

    //選擇資料表user，條件是欄位id = 1的
    $selectSql = "SELECT * FROM `kasavakan` WHERE `dialects_word` = 'sahar'";
    //echo $selectSql;
    //呼叫query方法(SQL語法)
    $memberData = $connect->query($selectSql);
    //有資料筆數大於0時才執行
    if ($memberData->num_rows > 0) {
    //讀取剛才取回的資料
        while ($row = $memberData->fetch_assoc()) {
            //print_r($row);
            $newData = $row;
        }
    } else {
        echo '0筆資料';
    }

    //print($newData['dialects_word']);
    //print($newData['chinese_word']);
    //print($newData['dialects_sentence']);
    //print($newData['chinese_sentence']);
    //print($newData['radical_word']);
    $theword = $newData['dialects_word'];

    $connect -> close();
    //--------------DB


    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'text', // 訊息類型 (文字)
                'text' => '文字：'.$theword // 回復訊息
            )
        )
    ));
}
