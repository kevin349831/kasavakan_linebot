<?php



//接收 ls3-1
if (strtolower($message['text']) == "new"){
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(

        array(
        "type" => "flex",
        "altText" => "Flex Message",
        "contents" => array(
          "type" => "carousel",
          "contents" => array(
            array(
              "type" => "bubble",
              "hero" => array(
                "type" => "image",
                "url" => "https://5905411752d6.ngrok.io/assets/images/ninestagepic/1-1-1.jpg",
                "size" => "full",
                "aspectRatio" => "1:2",
                "aspectMode" => "fit"
              )
            ),
            array(
              "type" => "bubble",
              "hero" => array(
                "type" => "image",
                "url" => "https://5905411752d6.ngrok.io/assets/images/ninestagepic/1-1-2.jpg",
                "margin" => "none",
                "size" => "full",
                "aspectRatio" => "1:2",
                "aspectMode" => "fit",
                "backgroundColor" => "#FFFFFF"
              )
            ),
            array(
              "type" => "bubble",
              "hero" => array(
                "type" => "image",
                "url" => "https://5905411752d6.ngrok.io/assets/images/ninestagepic/1-1-3.jpg",
                "size" => "full",
                "aspectRatio" => "1:2",
                "aspectMode" => "fit",
                "backgroundColor" => "#FFFFFF"
              )
            )
          )
        )
        )

        )
    ));
}
