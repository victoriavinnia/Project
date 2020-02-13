<?php
namespace User\MainProject\Models;

use User\MainProject\Core\DBConnection;
use User\MainProject\Models\AccountModel;

class ProductsModel
{
    const SUCCESS = "Товар добавлен в корзину";
    const ERROR = "Товар удален";


    private $db; // ссылка на связь базы данных
    private $account_model;
    public function __construct()
    {
        $this->db = DBConnection::getInstance();
    }

    public function getThree($sql_type){
        if ($sql_type === 'new_goods') {
            $sql = "SELECT articul, `name`, description, price, photo_product FROM products INNER JOIN photo_products ON products.articul = 
            photo_products.product_artcle LIMIT 3;";
        } elseif ($sql_type === 'hit') {
            $sql = "SELECT articul, `name`, description, price, photo_product FROM products INNER JOIN photo_products ON products.articul = 
            photo_products.product_artcle LIMIT 4, 3;";
        }
        return $this->db->queryAll($sql);
    }
    public function getRange(){
        $sql = "SELECT articul, `name`, description, price, photo_product FROM products INNER JOIN photo_products ON products.articul = 
            photo_products.product_artcle;";
        return $this->db->queryAll($sql);
    }
    public function getProductByArt($articul) {
        $sql = "SELECT articul, `name`, description, full_description, price, photo_product FROM products INNER JOIN photo_products 
            ON products.articul = photo_products.product_artcle WHERE articul = :articul;";
        return $this->db->execute($sql, ['articul'=>$articul], false);
    }
    public function getProduct(){
        $sql = "SELECT articul, `name`, description, price, photo_product FROM products INNER JOIN photo_products ON products.articul = 
            photo_products.product_artcle;";
        return $this->db->queryAll($sql);
    }
//    public function getOrder(){
//        $sql = "SELECT articul, name_product, `count`, cost, id_user FROM `order` WHERE id_user = :id_user;";
//        return $this->db->queryAll($sql);
//    }
    public function getOrder(array $order){
        $articul = $order['articul'];
        $name_product = $order['name'];
        $count = $order['count'];
        $cost = $order['cost'];
        $id_user = $order['id_user'];
        $sql = "SELECT articul, name_product, `count`, cost, id_user FROM `order` WHERE id_user = :id_user;";
        $params = [
            "articul" => $order['articul'],
            "name_product" => $order['name'],
            "count" => $order['count'],
            "cost" => $order['cost'],
            "id_user" => $order['id_user'],
        ];
        $order = $this->db->execute($sql, ['id_user' => $id_user], false);
        return $order;
    }
//    public function getOrder() {
//        $sql = "SELECT articul, name_product, `count`, cost, id_user FROM `order` WHERE id_user = :id_user;";
//        return $this->db->queryAll($sql);
//    }

    public function addProduct(array $product)     {
        $articul = $product['articul'];
        $name_product = $product['name'];
        var_dump($name_product);
        $count = $product['count'];
        $cost = $product['cost'];
        $sql = "INSERT INTO order (articul, name_product, `count`, cost, id_user) VALUES (:articul, :name_product, :`count`, :cost, :id_user)";
        $params = [
            "articul" => $product['articul'],
            "name_product" => $product['name'],
            "count" => $product['count'],
            "cost" => $product['cost'],
            "id_user" => $product['id_user'],
        ];
        $this->db->executeSql($sql, $params);
    }

}
