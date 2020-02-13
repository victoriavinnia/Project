<?php
namespace User\MainProject\Core;


class Application
{
    private $config;

    // инациализация значения свойства config на основе $config файла
    public function __construct($configFile)
    {
        $this->config =
            $this->loadConfig($configFile);
    }

    private function loadConfig($configFile){
        if (!is_readable($configFile)) {
            var_dump("not readable");
        }
        return json_decode( // преобразование json строки
            file_get_contents($configFile),// чтение содержимого файла, резкльтат json строка
            true // // преобразование json строки  в ассоциативный массив
        );
    }

    // метод создания ответа (объекта Response) на основе запроса (объекта Request)
    public function handleRequest(Request $request){
        $router = new Router($this->config['urls']);
        $db = DBConnection::getInstance();
        $db->initConnection($this->config['db']);
        // создание объекта Router
        // вызом метода dispatch. Метод принимает на вход метод запроса (REQUEST_METHOD) и строку запроса (REQUEST_URI)
        // метод возвращает информацию массивом, в котором содержится обработчик данного запроса (контроллер и его метод)
        // или информация о том, что реакция на данный запрос на описана в config файле
        $routeInfo = $router->dispatch(
            $request->getMethod(),
            $request->getUri()
        );
        // Статический метод класса Controller возвращает массив, содержащий объект необходимого контроллера,
        // имя метода и параметра запроса например articles/{id}, где id - параметр запроса -> articles/1
        $controllerData = Controller::create($routeInfo);
        $request->setParams($controllerData[1]);
        // функция call_user_func_array вызывает полученные ранее (40 строка) метод контроллера,
        // в метод передается объект запроса
        // методы - обработчики контроллеров возвращают сформированный ответ (объект Response)
        $response = call_user_func_array(
            $controllerData[0],
            [$request]
        );

        if (!$response instanceof Response){
            throw new \LogicException(
                "Problem with Response");
        }
        // метод возвращает ответ (объект Response), ответ отправляется в index.php
        return $response;
    }

}