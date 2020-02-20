<?php


namespace User\MainProject\Models;

use User\MainProject\Core\DBConnection;
class AdminModel
{
    const PRODUCT_ADD = "Товар добавлен";
    const PRODUCT_NOT_ADD = "Товар не добавлен";
    private $db;
    public function __construct()
    {
        $this->db = DBConnection::getInstance();
    }
    public function adminAdd(array $admin_data, $pic) {

        // загрузка изображения
//        $post = $_POST;
//        var_dump($post);
//        $files = $_FILES;
//        var_dump($files);
//        $file_name = $files['picture']['name'];
//        $tmp_name = $files['picture']['tmp_name'];
//        $file_size = $files['picture']['size'];
//        $num = count($files['picture']['name']);
//        for ($i = 0; $i < $num; $i++) {
//            $ext =  pathinfo($file_name[$i], PATHINFO_EXTENSION);
//            var_dump($ext);
//            if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {
//                var_dump($ext);
//                if ($file_size[$i] < 1024 * 1024) {
//                    $name = md5($file_name[$i]);
//                    $full_name = $name.'.'.$ext;
//                    var_dump($full_name);
//                    if(move_uploaded_file($pic, "/static/img//$full_name")) {
//                        echo "Файл успешно загружен";
//                    } else {
//                        echo "Не удалось загрузить файл";
//                    }
//                } else { echo 'Данный размер файла не поддерживается';}
//            } else { echo 'Данный тип файла не поддерживается';}
//        }
        $articul = $admin_data['articul'];
      //  var_dump($articul);
        $name = $admin_data['name'];
        $description = $admin_data['description'];
        $full_description = $admin_data['full_description'];
        $price = $admin_data['price'];
        $photo_product = $pic['name']; 
     //   var_dump($photo_product);
        $products_sql = "INSERT INTO products (`articul`, `name`, `description`, `full_description`, `price`) VALUES 
            (:articul, :name, :description, :full_description, :price)";
        $photo_products_sql = "INSERT INTO photo_products (photo_product, product_artcle) VALUES (:photo_product, :product_artcle)";
        try{
            $this->db->getConnection()->beginTransaction();
            $products_params = [
                "articul"=> $articul,
                "name"=> $name,
                "description"=> $description,
                "full_description"=> $full_description,
                "price"=> $price,
            ];

//            $this->db->executeSql($products_sql, $photo_products_sql);
            $photo_products_params = [
                'photo_product'=>$photo_product,
                'product_artcle'=> $articul
            ];
            $this->db->executeSql($products_sql, $products_params);
            $this->db->executeSql($photo_products_sql, $photo_products_params);
            // подтверждение транзакции
            $this->db->getConnection()->commit();
            return self::PRODUCT_ADD;
        } catch (Exception $e) {
            // обработка ошибки, откат транзакции
            $this->db->getConnection()->rollBack();
            return self::PRODUCT_NOT_ADD;
        }
    }
}