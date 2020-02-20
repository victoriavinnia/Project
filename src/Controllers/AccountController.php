<?php
namespace User\MainProject\Controllers;

use User\MainProject\Core\Controller;
use User\MainProject\Core\Request;
use User\MainProject\Models\AccountModel;
use User\MainProject\Core\DBConnection;

class AccountController extends Controller
{
    // чтобы обатиться к методу addUser нужно создать ссылку на него
    private $account_model;
    public function __construct()
    {
        $this->account_model = new AccountModel();
    }

    public function regAction(){
        $content = 'account/registration.php'; // ссылка на страницу которую мы хотим отобразить
        $data = [
            'page_title'=>'Зарегистрироваться', // здесь то что мы хотим добавить
            'stylesheet' => '<link rel="stylesheet" href="/static/css/registration.css">'
        ];
        return $this->generateResponse($content, $data);
    }
    public function accountAction(){
        $content = 'account/cabinet.php'; // ссылка на страницу которую мы хотим отобразить
        $data = [
            'page_title'=>'Личный кабинет',// здесь то что мы хотим добавить
            'stylesheet' => '<link rel="stylesheet" href="/static/css/cabinet.css">'
        ];
        return $this->generateResponse($content, $data);
    }
    public function addUser(Request $request){
        $result = $this->account_model->addUser($request->post());
        return $this->ajaxResponse($result);
    }

    public function login(Request $request) {
        $formData = $request->post();
        $result =  $this->account_model->autorisation($formData);
        if($result === AccountModel::SUCCESS) {
            $_SESSION['login'] = $formData['login'];
        }
        return $this->ajaxResponse($result);
    }

    public function logout() {
        $_SESSION = [];
        header('Location: /');
    }


}

