<?php

$NewString = strtolower($message['text']);
$NewArr = str_split($NewString,2); //st
$LessonArr = str_split($NewString,1); // [2]=數字 ex: st1 -> 1
$ls = 'ls'.$LessonArr[2];
//接收 st1
if (strtolower($NewArr[0]) == "st") {
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
                "url" => "https://static.vecteezy.com/system/resources/previews/000/460/815/non_2x/vector-illustration-of-ethnic-pattern.jpg",
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
                    "text" => "您想閱讀第 " . $LessonArr[2] . " 階段第幾課",
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
                        "type" => "box",
                        "layout" => "vertical",
                        "contents" => array(
                          array(
                            "type" => "button",
                            "action" => array(
                              "type" => "message",
                              "label" => "1",
                              "text" => $ls.'-1-1'
                            ),
                            "margin" => "xs",
                            "style" => "primary"
                          ),
                          array(
                            "type" => "button",
                            "action" => array(
                              "type" => "message",
                              "label" => "2",
                              "text" => $ls.'-2-1'
                            ),
                            "margin" => "xs",
                            "style" => "primary"
                          ),
                          array(
                            "type" => "button",
                            "action" => array(
                              "type" => "message",
                              "label" => "3",
                              "text" => $ls.'-3-1'
                            ),
                            "margin" => "xs",
                            "style" => "primary"
                          ),
                          array(
                            "type" => "button",
                            "action" => array(
                              "type" => "message",
                              "label" => "4",
                              "text" => $ls.'-4-1'
                            ),
                            "margin" => "xs",
                            "style" => "primary"
                          ),
                          array(
                            "type" => "button",
                            "action" => array(
                              "type" => "message",
                              "label" => "5",
                              "text" => $ls.'-5-1'
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
                        "layout" => "vertical",
                        "contents" => array(
                          array(
                            "type" => "button",
                            "action" => array(
                              "type" => "message",
                              "label" => "6",
                              "text" => $ls.'-6-1'
                            ),
                            "margin" => "xs",
                            "style" => "primary"
                          ),
                          array(
                            "type" => "button",
                            "action" => array(
                              "type" => "message",
                              "label" => "7",
                              "text" => $ls.'-7-1'
                            ),
                            "margin" => "xs",
                            "style" => "primary"
                          ),
                          array(
                            "type" => "button",
                            "action" => array(
                              "type" => "message",
                              "label" => "8",
                              "text" => $ls.'-8-1'
                            ),
                            "margin" => "xs",
                            "style" => "primary"
                          ),
                          array(
                            "type" => "button",
                            "action" => array(
                              "type" => "message",
                              "label" => "9",
                              "text" => $ls.'-9-1'
                            ),
                            "margin" => "xs",
                            "style" => "primary"
                          ),
                          array(
                            "type" => "button",
                            "action" => array(
                              "type" => "message",
                              "label" => "10",
                              "text" => $ls.'-10-1'
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
          )


        )
    ));
}
