<?php
$uniyan = '沒有';
if (strtolower($message['text']) == "text" || $message['text'] == "文字" || $message['text'] == "指令"){
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
              "type" => "flex",
              "altText" => "Flex Message",
              "contents" => array(
              "type"=> "bubble",
              "direction"=> "ltr",
              "header"=> array(
                "type"=> "box",
                "layout"=> "vertical",
                "contents"=> array(
                  array(
                    "type"=> "text",
                    "text"=> "sahar",
                    "size"=> "3xl",
                    "align"=> "center",
                    "contents"=> array()
                  )
                )
              ),
              "body"=> array(
                "type"=> "box",
                "layout"=> "vertical",
                "contents"=> array(
                  array(
                    "type"=> "box",
                    "layout"=> "horizontal",
                    "contents"=> array(
                      array(
                        "type"=> "text",
                        "text"=> $uniyan,
                        "size"=> "xl",
                        "color"=> "#AAAAAA",
                        "align"=> "start",
                        "contents"=> array()
                      ),
                      array(
                        "type"=> "text",
                        "text"=> "喜歡",
                        "size"=> "xl",
                        "align"=> "start",
                        "contents"=> array()
                      )
                    )
                  ),
                  array(
                    "type"=> "box",
                    "layout"=> "horizontal",
                    "contents"=> array(
                      array(
                        "type"=> "text",
                        "text"=> "族語例句",
                        "size"=> "xl",
                        "color"=> "#AAAAAA",
                        "align"=> "start",
                        "contents"=> array()
                      ),
                      array(
                        "type"=> "text",
                        "text"=> "sahar ku kani nu.",
                        "size"=> "xl",
                        "align"=> "start",
                        "wrap"=> true,
                        "contents"=> array()
                      )
                    )
                  ),
                  array(
                    "type"=> "box",
                    "layout"=> "horizontal",
                    "contents"=> array(
                      array(
                        "type"=> "text",
                        "text"=> "中文例句",
                        "size"=> "xl",
                        "color"=> "#AAAAAA",
                        "align"=> "start",
                        "contents"=> array()
                      ),
                      array(
                        "type"=> "text",
                        "text"=> "我喜歡你",
                        "size"=> "xl",
                        "align"=> "start",
                        "wrap"=> true,
                        "contents"=> array()
                      )
                    )
                  ),
                  array(
                    "type"=> "box",
                    "layout"=> "horizontal",
                    "contents"=> array(
                      array(
                        "type"=> "text",
                        "text"=> "字根",
                        "size"=> "xl",
                        "color"=> "#AAAAAA",
                        "align"=> "start",
                        "contents"=> array()
                      ),
                      array(
                        "type"=> "text",
                        "text"=> "sahar",
                        "size"=> "xl",
                        "align"=> "start",
                        "wrap"=> true,
                        "contents"=> array()
                      )
                    )
                  )
                )
              ),
              "footer"=> array(
                "type"=> "box",
                "layout"=> "horizontal",
                "contents"=> array(
                  array(
                    "type"=> "button",
                    "action"=> array(
                      "type"=> "message",
                      "label"=> "聽發音",
                      "text"=> "sahar"
                    ),
                    "style"=> "primary"
                  )
                )
              )
            )
          )

        )
    ));
}
