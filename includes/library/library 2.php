<?php
/**
 * Copyright 2017 GoneTone
 *
 * Line Bot
 * 範例 Example Bot (Text)
 *
 * 此範例 GitHub 專案：https://github.com/GoneTone/line-example-bot-php
 * 官方文檔：https://developers.line.biz/en/reference/messaging-api#text-message
 */
/**
陣列輸出 Json
==============================
{
  "type": "flex",
  "altText": "Flex Message",
  "contents": {
    "type": "bubble",
    "direction": "ltr",
    "header": {
      "type": "box",
      "layout": "vertical",
      "contents": [
        {
          "type": "text",
          "text": "九階教材",
          "align": "center"
        }
      ]
    },
    "hero": {
      "type": "image",
      "url": "https://web.klokah.tw/index/image/stamp/nine.png",
      "size": "full",
      "aspectRatio": "1.51:1",
      "aspectMode": "fit"
    },
    "body": {
      "type": "box",
      "layout": "vertical",
      "contents": [
        {
          "type": "text",
          "text": "選擇第幾階",
          "align": "center"
        }
      ]
    },
    "footer": {
      "type": "box",
      "layout": "vertical",
      "contents": [
        {
          "type": "button",
          "action": {
            "type": "message",
            "label": "第一階",
            "text": "第一階"
          }
        }
      ]
    }
  }
}
==============================
*/

$json = file_get_contents('./includes/library/library.json');
# 將 JSON 格式資料轉換為 PHP 物件
$obj = json_decode($json, true);
# 檢視結果
$newa = $obj[0]["radical"] . " - " . $obj[0]["chinese"] . '
' . '
' . $obj[0]["sentences"] . '
' . '
' . $obj[0]["translation"];
if (strtolower($message['text']) == "word" || $message['text'] == "字根"){
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                "type" => "flex",
                "altText" => "Flex Message",
                "contents" => array(
                  "type" => "bubble",
                  "direction" => "ltr",
                  "header" => array(
                    "type" => "box",
                    "layout" => "vertical",
                    "contents" => array(
                      array(
                        "type" => "text",
                        "text" => "九階教材",
                        "align" => "center"
                      )
                    )
                  ),
                  "hero" => array(
                    "type" => "image",
                    "url" => "https://web.klokah.tw/index/image/stamp/nine.png",
                    "size" => "full",
                    "aspectRatio" => "1.51:1",
                    "aspectMode" => "fit"
                  ),
                  "body" => array(
                    "type" => "box",
                    "layout" => "vertical",
                    "contents" => array(
                      array(
                        "type" => "text",
                        "text" => "選擇第幾階",
                        "align" => "center"
                      )
                    )
                  ),
                  "footer" => array(
                    "type" => "box",
                    "layout" => "vertical",
                    "contents" => array(
                      array(
                        "type" => "button",
                        "action" => array(
                          "type" => "message",
                          "label" => "第一階",
                          "text" => "第一階"
                        )
                      )
                    )
                  )
                )
            )
        )
    ));
}
