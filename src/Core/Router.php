<?php
namespace User\MainProject\Core;


class Router
{
    private $dispatcher_func;
    public function __construct(array $urls)
    {
        $this->dispatcher_func =
            $this->setOptions($urls);
    }
    private function setOptions(array $urls){
        return function (\FastRoute\RouteCollector $r)
        use ($urls) {
            // передача данных из config файла в библиотеку
            // в библиотеку передаются запросы, поддерживаемые сервером и их обработчики (контроллер::метод)
            foreach ($urls as $name => $data){
                $arr =
                    explode("::", $data['controller']);
//                $r->addRoute('GET', '/users', 'get_all_users_handler');
                $r->addRoute($data['method'], $data['path'],
                    [$arr[0], $arr[1]]);

            }
        };
    }

    public function dispatch($httpMethod, $uri){
        // в функцию \FastRoute\simpleDispatcher библиотеки nikic/fast-route
        // передается функция, в которй происходит передача данных из config файла в библиотеку
        $dispatcher = \FastRoute\simpleDispatcher($this->dispatcher_func);
        // метод dispatch определяет, есть ли на сервере обработчик данного клиентского запроса,
        // сравнивает ранее переданные в библиотек данные с данными запроса
        // метод возвращает обработкик (имя контроллера и метод) данного запроса или информацию о том,
        // что на сервере нет обработчика для данного клиентского запроса.
        // Метод возвращает данные массивом
        return $dispatcher->dispatch($httpMethod, $uri);
    }
}



