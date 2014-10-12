<?php
// the server api key you received from Google in part2

// Google address to post gcm requests to

/*
    chose the type of notification you'd like to receive. chose from either of these: SimpleNotification / BitmapNotification / SimpleDialog
    if you set $type to SimpleNotification, you should send the following parameters:
    $id >> to chose which sound/icon to use for the notification
    $count >> a number which will be attached to the icon of the notification and if set to true, nothing would attach
    $title >> the title of the notification
    $msg >> the message which will be shown in the notification
    $info >> some string to be send to Air app. gcm will do nothing with it!

    if you set $type to BitmapNotification, you should send the following parameters:
    $id >> to chose which sound to use for the notification. you can't use icon with this type, you'll have $imageUrl instead
    $title >> the title of the notification
    $msg >> the message which will be shown in the notification
    $imageUrl >> this will be the address of the image to be shown in the notification
    $info >> some string to be send to Air app. gcm will do nothing with it!

    if you set $type to SimpleDialog, you should send the following parameters:
    $id >> to chose which sound to use when the GCM arrives. you may set it to something irrelevant than the array of sounds you have set in Air and it will play no sound!
    $title >> the title of the dialog window
    $msg >> the message which will be shown in the dialog window
    $info >> some string to be send to Air app. gcm will do nothing with it!
*/

//SimpleLink|SimpleNotification|SimpleDialog|BitmapNotification|SimpleNotification;

// id for your gcm message. This will play the first sound in _ex.setSound and showing the first icon in _ex.setIcon  
// the count number you want to have attached to your main account. Value can be between 0 and 99


function send($opt){
    $title = $opt["title"];
    $msg = $opt["content"];
    $imageUrl = $opt["imageURL"];
    $linkUrl = $opt["linkURL"];
    $type = "SimpleLink";

    $count = "0";
    $info = '';
    $id = "0";
    $url = "https://android.googleapis.com/gcm/send";
    $apiKey = "AIzaSyDSwjDATD72McZRbQdsAaWnaw1jE_73hwk";
    $headers = array("Authorization: key=" . $apiKey, "Content-Type: application/json");
    
    $regIDs = explode(",", $opt["register_ids"]);

    $params = array("registration_ids" => $regIDs, "data" => array("type" => $type, "id" => $id, "count" => $count, "title" => $title, "msg" => $msg, "imageUrl" => $imageUrl, "linkUrl" => $linkUrl,"info" => $info));


    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, $url ); 
    curl_setopt( $ch, CURLOPT_POST, true );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
    curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($params) );
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;    
}


?>