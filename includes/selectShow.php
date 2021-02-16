<?php


if (true){
    $theword = "'".strtolower($message['text'])."'";

    $ethnic ='';
    $chinese = '';
    $ethnic_sentence='';
    $chinese_sentence='';
    $radical ='';

    $host        = "host=ec2-100-24-139-146.compute-1.amazonaws.com";
    $port        = "port=5432";
    $dbname      = "dbname=d74b535jl61vqu";
    $credentials = "user=erlewlqwfxroic password=24a136a16b48e1a0e38c616d42af528d8280cdbbb933393dde8fa83da2cee8b0";

    $db = pg_connect( "$host $port $dbname $credentials"  );
    if(!$db){
      echo "Error : Unable to open database";
    } else {
      echo "Opened database successfully";
    }
    //------DB CONNETC
    $sql =<<<EOF
    SELECT * FROM public.kasavakan_db WHERE ethnic like $theword;
    EOF;
    $ret = pg_query($db, $sql);
    if(!$ret){
    echo pg_last_error($db);
    exit;
    }
    while($row = pg_fetch_row($ret)){
    $ethnic = $row[0];
    $chinese = $row[1];
    $ethnic_sentence = $row[2];
    $chinese_sentence = $row[3];
    $radical = $row[4];
    }
    echo "Operation done successfully";
    pg_close($db);
    //DB SELECT
    //--------------DB





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
                    "text"=> $radical,
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
                        "text"=> "中文",
                        "size"=> "xl",
                        "color"=> "#AAAAAA",
                        "align"=> "start",
                        "contents"=> array()
                      ),
                      array(
                        "type"=> "text",
                        "text"=> $chinese,
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
                        "text"=> $ethnic_sentence,
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
                        "text"=> $chinese_sentence,
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
                        "text"=> $radical,
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
                      "text"=> $ethnic
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
