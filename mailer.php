<?php
require 'vendor/autoload.php'; // Подключаем библиотеку Twilio

use Twilio\Rest\Client;

try {
    // Получаем IP адрес пользователя
    $ip = $_SERVER['REMOTE_ADDR'];
    
    // Настройки Twilio
    $sid = 'USfbdb804e90983d0508aa83d262f8fcce'; // Укажи свой SID из Twilio
    $auth_token = '1bac'; // Укажи свой Auth Token
    $twilio_number = '+18455938187'; // Номер, выданный Twilio
    $to_number = '+380991170668'; // Твой номер телефона, на который отправляется SMS
    
    // Сообщение с IP
    $message = "Новый посетитель. IP: $ip";
    
    // Инициализация клиента Twilio
    $client = new Client($sid, $auth_token);
    
    // Отправка SMS
    $client->messages->create(
        $to_number, // Номер получателя
        [
            'from' => $twilio_number, // Номер отправителя (выдан Twilio)
            'body' => $message, // Текст сообщения
        ]
    );

    echo "IP был отправлен на номер телефона";
} catch (Exception $e) {
    echo "Ошибка отправки SMS: {$e->getMessage()}";
}
?>
