<?php

$from = 'subscribe@shoppinglass.com.br';

$sendTo = 'subscribe@shoppinglass.com.br';

$subject = 'New message from contact form';

$fields = array('email' => 'Email'); 

error_reporting(E_ALL & ~E_NOTICE);

try
{

    if(count($_POST) == 0) throw new \Exception('Form is empty');
            
    $emailText = "You have a new message from your contact form\n=============================\n";

    foreach ($_POST as $key => $value) {
        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n";
        }
    }

    $headers = array('Content-Type: text/plain; charset="UTF-8";',
        'From: ' . $from,
        'Reply-To: ' . $from,
        'Return-Path: ' . $from,
    );
    
    mail($sendTo, $subject, $emailText, implode("\n", $headers));

    echo "<script>window.alert('Seu e-mail foi inscrito com sucesso!');window.location.href='https://shoppinglass.com.br'</script>";
}
catch (\Exception $e)
{
    echo "<script>window.alert('Aconteceu algum erro, tente novamente!');window.location.href='https://shoppinglass.com.br'</script>";
}


if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}
else {
    echo $responseArray['message'];
}
?>
