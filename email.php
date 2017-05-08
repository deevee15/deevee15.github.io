<?
    $msg = "Ты лох";
    $from = "danil11102@mail.ru";
    $to = "danil11102@mail.ru";
    $subject = "Тема";
    $subject = "=?utf-?B?".base64_encode($subject)."?=";
    $headers = "From: $from\r\nReply-to: $from\r\nContent-type: text/plain; charset=utf-8\r\n";
    mail($to, $subject, $msg, $headers);
?>