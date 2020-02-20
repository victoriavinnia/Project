<?php

namespace User\MainProject\Models;

use User\MainProject\Core\DBConnection;

class ProductsModel
{
    const SUCCESS = "Товар добавлен в корзину";
    const ERROR = "Товар удален";

    private $db; // ссылка на связь базы данных

    public function __construct()
    {
        $this->db = DBConnection::getInstance();
    }

    public function getThree($sql_type)
    {
        if ($sql_type === 'new_goods') {
            $sql = "SELECT articul, `name`, description, price, photo_product FROM products INNER JOIN photo_products ON products.articul = 
            photo_products.product_artcle LIMIT 3;";
        } elseif ($sql_type === 'hit') {
            $sql = "SELECT articul, `name`, description, price, photo_product FROM products INNER JOIN photo_products ON products.articul = 
            photo_products.product_artcle LIMIT 4, 3;";
        }
        return $this->db->queryAll($sql);
    }

    public function getRange()
    {
        $sql = "SELECT articul, `name`, description, price, photo_product FROM products INNER JOIN photo_products ON products.articul = 
            photo_products.product_artcle;";
        return $this->db->queryAll($sql);
    }

    public function getProductByArt($articul)
    {
        $sql = "SELECT articul, `name`, description, full_description, price, photo_product FROM products INNER JOIN photo_products 
            ON products.articul = photo_products.product_artcle WHERE articul = :articul;";
        return $this->db->execute($sql, ['articul' => $articul], false);
    }
//    public function getProduct(){
//        $sql = "SELECT articul, `name`, description, price, photo_product FROM products INNER JOIN photo_products ON products.articul =
//            photo_products.product_artcle;";
//        return $this->db->queryAll($sql);
//    }

    public function getOrder($id)
    {
        $sql = "SELECT * FROM `order` WHERE id_user = :id_user;";

        return $this->db->execute($sql, ['id_user' => $id], true);
    }

    public function addProduct(array $product)
    {
        $existsProduct = $this->checkAlreadyAdded($product['userId'], $product['articul']);

        if ($existsProduct){
            $params = null;

            $params1 = [
                'articul' => $product['articul'],
                'cost' => $existsProduct['cost'] + $product['price'] * $product['count'],
                'id_user' => $product['userId'],
                'countity' => $existsProduct['count'] + $product['count'],
            ];
            $sql = "UPDATE `order` SET `count`=:countity, cost=:cost  WHERE articul=:articul AND id_user=:id_user";

            $this->db->executeSql($sql, $params1);

        } elseif (!$existsProduct){
            $params = null;

            $params = [
                'articul' => $product['articul'],
                'cost' => $product['price'] * $product['count'],
                'name_product' => $product['name'],
                'id_user' => $product['userId'],
                'countity' => $product['count'],
            ];
            //var_dump($product['price']);
            $sql = "INSERT INTO `order` (articul, name_product, `count`, cost, id_user) VALUES (:articul, :name_product,
:countity, :cost, :id_user)";

            return $this->db->execute($sql, $params);
        }
    }

    private function checkAlreadyAdded($userId, $articul)
    {
        $params = null;

        $params = [
            'articul' => $articul,
            'id_user' =>$userId,
        ];

        $sql = "SELECT * FROM `order` WHERE id_user = :id_user AND articul = :articul;";

        return $this->db->execute($sql, $params, false);
    }
    public function makeOrder(array $order) {


        foreach ($order as $item) {
            $articul = $item['articul'];
//            $price = $item['price'];
            $countity= $item['count'];
            $cost = $item['cost'];
            $id_user = $item['id'];
          //  var_dump($cost);
            $sql = "INSERT INTO `main_order` (articul, `count`, cost, id_user) VALUES (:articul, :countity, :cost, :id_user)";
          //  $cost = $item['price'] * $item['count'];
         //   var_dump($cost);
            $params = [
                'articul' => $item['articul'],
                'countity' => $item['count'],
                'cost' => $cost,
                'id_user' => $item['id'],
            ];
             $this->db->executeSql($sql, $params);
        }
    }

}
