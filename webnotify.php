<?php

    // Sets our destination URL
    $endpoint_url = 'https://notify-bot.line.me/oauth/authorize';

    // Creates our data array that we want to post to the endpoint
    $data_to_post = [
        'response_type' => "code",
        'client_id' => "v6d0sJJYbdl8FKAbwpD34M",
        'redirect_uri' => "https://b426b64d.ngrok.io/cnu-line-bot/webnotify.php",
        'scope' => "notify",
        'state' => "cnu123"
    ];
    
    // Sets our options array so we can assign them all at once
    $options = [
        CURLOPT_URL        => $endpoint_url,
        CURLOPT_POST       => true,
        CURLOPT_POSTFIELDS => $data_to_post,
    ];
    
    // Initiates the cURL object
    $curl = curl_init();
    
    // Assigns our options
    curl_setopt_array($curl, $options);
    
    // Executes the cURL POST
    $results = curl_exec($curl);
    
    // Be kind, tidy up!
    curl_close($curl);
    
    echo $results;
    // if($results == "1"){

    // }else{

    // }


    
    return $replyData;
?>
