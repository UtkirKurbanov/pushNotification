<?php
function sendFCM() {
    $url = 'https://fmc.googleapis.com/fmc/send';
    //SERVER KEY
    $apiKey = 'server-api-key';

    $headers = array(
        'Authorization:key=' .$apiKey,
        'Content-Type:application/json'
    );
        
    //Notification content
    $notifData = [
        'title' => 'My New Notification',
        'body' => 'My Notification Body',
        //'image' => 'IMAGE - URL',
        //'click_action' => 'activities.notifhandler' 
    ];

    //Optional
    $dataPayload = [
        'to' => 'VIP',
        'date' => '2023-04-10',
        'other_data' => 'Data grnls ndslkg'
    ];

    //Create API Body
    $notifBody = [
        'notification' => $notifData,
        //data payload is optional
        'data' => $dataPayload,
        //optional - in seconds, max_time = 4 weeks
        'time_to_live' => 3600,
        //'to' => 'Token or REG_id'
        'to' => 'topics/newoffer'
        //'registration_ids' = Array of registration_ids or token JSON           
    ];

    $ch = curl_init();
    curl_setopt($ch CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);    
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($notifBody));

    //Execute
    $result = curl_exec($ch);
    print($result);

    curl_close($ch);
}

sendFCM();
?>