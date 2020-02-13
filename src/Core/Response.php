<?php

namespace User\MainProject\Core;


class Response
{
    private $body;
    private $headers = [];
    private $statusCode = 200;

    public function __construct(
        $body='',$headers=[],$statusCode=200)
    {
        $this->setBody($body)
            ->setHeaders($headers)
            ->setStatusCode($statusCode);
    }

    // установка значения тело ответа
    public function setBody($body){
        $this->body = $body;
        return $this;
    }
    public function setHeaders($headers){
        $this->headers = $headers;
        return $this;
    }
    public function setStatusCode($code){
        $this->statusCode = $code;
        return $this;
    }

    // отправка ответа клиенту
    public function send(){
        $this->sendBody();
        return $this;
    }

    // отправка тела запроса
    private function sendBody(){
        echo $this->body; // вывод значения body на экран
    }
}