<?php


$url = 'https://3a321c3f4755.ngrok.io/ninestagepic/stage1/'; // ngrok 重開就要更改
if (strtolower($message['text']) == "九階教材" || $message['text'] == "課本") {
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
                        "type" => "separator",
                        "color" => "#FFFFFF"
                      )
                    )
                  ),
                  "hero" => array(
                    "type" => "image",
                    //"url" => "https://static.vecteezy.com/system/resources/previews/000/460/815/non_2x/vector-illustration-of-ethnic-pattern.jpg",
                    "url" => "https://raw.githubusercontent.com/kevin349831/kasavakan_linebot/master/picture/stage_1/1-1-1.jpg",
                    "margin" => "xs",
                    "size" => "full",
                    "aspectRatio" => "1.51:1",
                    "aspectMode" => "cover"
                  ),
                  "body" => array(
                    "type" => "box",
                    "layout" => "vertical",
                    "contents" => array(
                      array(
                        "type" => "text",
                        "text" => "您想閱讀第幾階",
                        "margin" => "xs",
                        "align" => "center",
                        "weight" => "bold"
                      )
                    )
                  ),
                  "footer" => array(
                    "type" => "box",
                    "layout" => "vertical",
                    "contents" => array(
                      array(
                        "type" => "box",
                        "layout" => "horizontal",
                        "contents" => array(
                          array(
                            "type" => "button",
                            "action" => array(
                              "type" => "message",
                              "label" => "1",
                              "text" => "st1"
                            ),
                            "margin" => "xs",
                            "style" => "primary"
                          ),
                          array(
                            "type" => "button",
                            "action" => array(
                              "type" => "message",
                              "label" => "2",
                              "text" => "st2"
                            ),
                            "margin" => "xs",
                            "style" => "primary"
                          ),
                          array(
                            "type" => "button",
                            "action" => array(
                              "type" => "message",
                              "label" => "3",
                              "text" => "st3"
                            ),
                            "margin" => "xs",
                            "style" => "primary"
                          )
                        )
                      ),
                      array(
                        "type" => "separator",
                        "margin" => "xs",
                        "color" => "#FFFFFF"
                      ),
                      array(
                        "type" => "box",
                        "layout" => "horizontal",
                        "contents" => array(
                          array(
                            "type" => "button",
                            "action" => array(
                              "type" => "message",
                              "label" => "4",
                              "text" => "st4"
                            ),
                            "margin" => "xs",
                            "style" => "primary"
                          ),
                          array(
                            "type" => "button",
                            "action" => array(
                              "type" => "message",
                              "label" => "5",
                              "text" => "st5"
                            ),
                            "margin" => "xs",
                            "style" => "primary"
                          ),
                          array(
                            "type" => "button",
                            "action" => array(
                              "type" => "message",
                              "label" => "6",
                              "text" => "st6"
                            ),
                            "margin" => "xs",
                            "style" => "primary"
                          )
                        )
                      ),
                      array(
                        "type" => "separator",
                        "margin" => "xs",
                        "color" => "#FFFFFF"
                      ),
                      array(
                        "type" => "box",
                        "layout" => "horizontal",
                        "contents" => array(
                          array(
                            "type" => "button",
                            "action" => array(
                              "type" => "message",
                              "label" => "7",
                              "text" => "st7"
                            ),
                            "margin" => "xs",
                            "style" => "primary"
                          ),
                          array(
                            "type" => "button",
                            "action" => array(
                              "type" => "message",
                              "label" => "8",
                              "text" => "st8"
                            ),
                            "margin" => "xs",
                            "style" => "primary"
                          ),
                          array(
                            "type" => "button",
                            "action" => array(
                              "type" => "message",
                              "label" => "9",
                              "text" => "st9"
                            ),
                            "margin" => "xs",
                            "style" => "primary"
                          )
                        )
                      )
                    )
                  )
                )
            )
        )
    ));
}
