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
//    public function getProduct(){
//        $sql = "SELECT articul, `name`, description, price, photo_product FROM products INNER JOIN photo_products ON products.articul =
//            photo_products.product_artcle;";
//        return $this->db->queryAll($sql);
//    }

    public function getOrder($id) {
        $sql = "SELECT articul, name_product, `count`, cost, id_user FROM `order` WHERE id_user = :id_user;";
        return  $this->db->execute($sql, ['id_user' => $id], false);
    }

    public function addProduct(array $product)     {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post = $_POST;
            if(isset($post['id'])) {
                if($post['id'] != $_COOKIE['id']) {
                    setcookie('id', $post['id'], time()+3600);
                    $id = $post['id'];
             $sql = "INSERT INTO order (articul, name_product, `count`, cost, id_user) VALUES (:articul, :name_product, 
:`count`, :cost, :id_user) WHERE id_user = :id;";
                    return $this->db->execute($sql, ['id_user'=>$id], false);
                } else {
                    $id = $_COOKIE['id'];
                }
            }
        }
    }
}
