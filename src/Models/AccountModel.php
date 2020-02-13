<?php
namespace User\MainProject\Models;

use User\MainProject\Core\DBConnection;

class AccountModel
{
    const SUCCESS = "Авторизация прошла успешно";
    const ERROR = "Ошибка авторизации";
    const USER_EXISTS = "Пользователь с таким логином уже существует";
 //   const REGISTRATION_FAILD = "Вы не были зарегистрированы.Попробуйте еще раз.";
    const REGISTRATION_SUCCESS = "Регистрация прошла успешно";
    private $db; // ссылка на связь базы данных
    public function __construct()
    {
        $this->db = DBConnection::getInstance();
    }
    public function autorisation(array $formData) {
        $login = $formData['login'];
        $pwd = $formData['pwd'];
        $user = $this->isUser($login);
        if(!$user) {
            return self::ERROR;
        }
     //   if(!password_verify($pwd, $user['pwd'])) {
        if($pwd !== $user['pwd']) {
            return self::ERROR;
        }
        return self::SUCCESS;
    }

    // проверка уникальности логина
    // если такого логина еще нет, хешируем пароль, добавление контактной информации в таблицу users
    public function addUser(array $user_data) {
        $name_users = $user_data['username'];
        $email = $user_data['email'];
        $login = $user_data['login'];
        if ($this->isUser($login)) return self::USER_EXISTS;
        $pwd = $user_data['pwd'];
//        $pwd = password_hash($pwd, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name_users, email, login, pwd) VALUES (:name_users, :email, :login, :pwd)";
        $params = [
            "name_users" => $user_data['username'],
            "email" => $user_data['email'],
            "login" => $user_data['login'],
            "pwd" => $user_data['pwd'],
        ];
        $this->db->executeSql($sql, $params);
        return self::REGISTRATION_SUCCESS;
    }
    private function isUser(string $login) {
        $sql = 'SELECT `login`, `pwd` FROM users WHERE login = :login';
        $user = $this->db->execute($sql, ['login' => $login], false);
      //  var_dump($user);
        return $user;

    }
}