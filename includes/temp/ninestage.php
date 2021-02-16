<?php
/**
 * Copyright 2017 GoneTone
 *
 * Line Bot
 * 範例 Example Bot (Imagemap)
 *
 * 此範例 GitHub 專案：https://github.com/GoneTone/line-example-bot-php
 * 官方文檔：https://developers.line.biz/en/reference/messaging-api#imagemap-message
 */
/**
陣列輸出 Json
==============================
{
    "type": "imagemap",
    "baseUrl": "https://api.reh.tw/line/bot/example/assets/images/example",
    "altText": "Example imagemap"
    "baseSize": {
        "height": 1040,
        "width": 1040
    },
    "actions": [
        {
            "type": "uri",
            "linkUri": "https://github.com/GoneTone/line-example-bot-php",
            "area": {
                "x": 0,
                "y": 0,
                "width": 520,
                "height": 1040
            }
        },
        {
            "type": "message",
            "text": "Hello",
            "area": {
                "x": 520,
                "y": 0,
                "width": 520,
                "height": 1040
            }
        }
    ]
}
==============================
*/

$url = 'https://2ac817fa7c28.ngrok.io/result/'; // ngrok 重開就要更改
$NewString = strtolower($message['text']);
$NewArr = str_split($NewString,2); //將訊息以兩個字元切割成，如果開頭是ns就會啟動九階教材

if (strtolower($message['text']) == "ns" || $NewArr[0] == "ns"){
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'imagemap', // 訊息類型 (圖片地圖)
                'baseUrl' => $url.'1-0.jpg', // 圖片網址 (可調整大小 240px, 300px, 460px, 700px, 1040px)
                'altText' => 'Example imagemap', // 替代文字
                'baseSize' => array(
                    'height' => 1600, // 圖片高
                    'width' => 1040 // 圖片寬
                ),
                'actions' => array(
                    array(
                        'type' => 'message', // 類型 (用戶發送訊息)
                        'text' => 'nss', // 發送訊息
                        'area' => array(
                            'x' => 0, // 點擊位置 X 軸
                            'y' => 0, // 點擊位置 Y 軸
                            'width' => 520, // 點擊範圍寬度
                            'height' => 1600 // 點擊範圍高度
                        )
                    ),
                    array(
                        'type' => 'message', // 類型 (用戶發送訊息)
                        'text' => 'ns1-1', // 發送訊息
                        'area' => array(
                            'x' => 520, // 點擊位置 X 軸
                            'y' => 0, // 點擊位置 Y 軸
                            'width' => 520, // 點擊範圍寬度
                            'height' => 1600 // 點擊範圍高度
                        )
                    )
                )
            )
        )
    ));
}
