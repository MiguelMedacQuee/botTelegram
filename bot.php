<?php
    $token = "6201253428:AAGlw5IAoqFN9-qgG3KPJWiF7xvOUM7L6Ro";
    $website = 'https://api.telegram.org/bot'.$token;

    $input = file_get_contents('php://input');
    $update = json_decode($input, TRUE);

    $chatId = $update['message']['chat']['id'];
    $message = $update['message']['text'];

    switch($message){
        case '/start':
            $response = 'Me has iniciado';
            sendMessage($chatId,$response);
            break;
        case '/info':
            $response = 'Hola! Soy @SpeedyBot';
            sendMessage($chatId,$response);
            break;
        default:
            $response = 'No te he entendido';
            sendMessage($chatId,$response);
            break;
    }

    function sendMessage($chatId,$response){

        $url = $GLOBALS['website'].'/sendMessage?chat_id='.$chatId.'&parse_mode=HTML&text='.urlencode($response);
        file_get_contents($url);
    }

?>