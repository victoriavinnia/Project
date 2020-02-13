<?php


namespace User\MainProject\Controllers;

use User\MainProject\Core\Controller;
use User\MainProject\Core\DBConnection;
use User\MainProject\Core\Request;
use User\MainProject\Models\AdminModel;
class AdminController extends Controller
{
    private $admin_model;
    private $db_connection;
    public function __construct() {
        $this->db_connection = DBConnection::getInstance();
        $this->admin_model = new AdminModel();
    }
    public function adminAction() {
        $content = 'admin/admin.php'; // ссылка на страницу которую мы хотим отобразить
        $data = [
            'page_title'=>'Страница Администратора',// здесь то что мы хотим добавить
            'stylesheet'=> '<link rel="stylesheet" href="/static/css/admin.css">'
        ];
        return $this->generateResponse($content, $data);
    }
    public function adminAddAction(Request $request){

        $pic = $request->files()['photo_product'];
        // Загрузка изображения

         $result = $this->admin_model->adminAdd($request->post(), $pic);
        $content = 'admin/admin.php';
        $data = [
            'page_title'=>'Страница Администратора',// здесь то что мы хотим добавить
            'result' => $result,
        ];
      //  return $this->ajaxResponse($result);
        return $this->generateResponse($content, $data);
    }

}

