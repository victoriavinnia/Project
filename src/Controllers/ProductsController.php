<?php
namespace User\MainProject\Controllers;

use User\MainProject\Core\Controller;
use User\MainProject\Core\DBConnection;
use User\MainProject\Core\Request;
use User\MainProject\Models\ProductsModel;


class ProductsController extends Controller
{
    private $products_model;
    private $db_connection;

    public function __construct()
    {
        $this->db_connection = DBConnection::getInstance();
        $this->products_model = new ProductsModel();
    }

    public function indexAction()
    {
        $new_goods = $this->products_model->getThree('new_goods');
        $hit = $this->products_model->getThree('hit');
        $content = 'products/project.php';
        $data = [
            'page_title' => 'Главная',
            'new_goods' => $new_goods,
            'hit' => $hit,
            'stylesheet' => '<link rel="stylesheet" href="/static/css/project.css">',
        ];
        return $this->generateResponse($content, $data);
    }

    public function rangeAction()
    {
        $range = $this->products_model->getRange();
        $content = 'products/range.php';
        $data = [
            'page_title' => 'Ассортимент',
            'range' => $range,
            'stylesheet' => '<link rel="stylesheet" href="/static/css/range.css">',
        ];
        return $this->generateResponse($content, $data);

    }

    public function productAction(Request $request)
    {
        $articul = $request->params()['articul'];
        $content = 'products/product.php';
        $product = $this->products_model->getProductByArt($articul);
//        var_dump($product);
        $data = [
            'page_title' => $product['name'],
            'product' => $product,
            'stylesheet' => '<link rel="stylesheet" href="/static/css/product.css">',
        ];
        return $this->generateResponse($content, $data);
    }
    public function cartsAction(Request $request) {
        $id = null;
        if($_SESSION['id']) {
            $id = $_SESSION['id'];
        }

//        $id_user = $request->params()['id_user'];
//        var_dump($request);
        if (isset($id)) {
            $content = 'cart/cart.php';
            $order = $this->products_model->getOrder($id);

            $data = [
                'page_title' => 'Ваша корзина',
                'order' => $order,
                'stylesheet'=> '<link rel="stylesheet" href="/static/css/cart.css">',
            ];
            return $this->generateResponse($content, $data);
        } else {
            header('Location: /cabinet');
        }
    }

    public function addToDB(Request $request) {
        $productData = $request->post();
        $this->products_model->addProduct($productData);

        return $this->ajaxResponse('success');
    }
    public function makeOrder(Request $request) {
        $order = $request->post()['order'];
        $order = json_decode($order, true);
        $this->products_model->makeOrder($order);

        return $this->ajaxResponse($order);
     //   return $this->generateResponse('success');
    }

}

