<?php
namespace User\MainProject\Core;

class Controller
{
    // метод на основе полученной от роутера информации формирует массив,
    // содержащий объект контроллера, имя метода - обработчик запроса, параметры запроса
    // или возвращает null, если роутер определил, что данный запрос не обрабатывается сервером
    public static function create(array $routeInfo){
        $controllerData = null;
        // var_dump($routeInfo);
        switch ($routeInfo[0]){
            case 0:
                var_dump("404 NOT FOUND");
                break;
            case 2:
                var_dump("405 Method Not Allowed");
                break;
            case 1:
                $handler = $routeInfo[1];
                $controller = $handler[0];
                $action = $handler[1];
                $params = $routeInfo[2];

                $controllerData = [[new $controller(), $action], $params];
                break;
        }
        return $controllerData;

    }

    // метод создает ответ (объект Response), устанавливает тело ответа (body)
    // и возвращает сформированный объект
    protected function generateResponse($content, array $data,
                     $template = 'template.php'){
        $response = new Response();
        $response->setBody(
            $this->render_page($content, $data,
                $template)
        );
        return $response;
    }

    // метод принимает на вход html шаблон, html с основным содержимым
    // и данные, которыне необходимо передать в html
    // возвращает сгенерированную html страницу
    private function render_page($content,
                                 array $data,
                                 $template)
    {
        extract($data);
        ob_start();
        include_once __DIR__ .
            '/../Views/' . $template;
        $page = ob_get_contents();
        ob_end_clean();
        return $page;
    }
    protected function ajaxResponse($data) {
        $response = new Response();
        $response->setBody($data);
        return $response;
    }
}