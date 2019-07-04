<?php

namespace Web\FrontController\Controllers;

use Web\FrontController\Core\Controller;
use Web\FrontController\Models\Order;



class CartController extends Controller
{
      private $order;
      public function __construct()
      {
          $this->order = new Order();
      }
      public function addpictureAction($id)
      {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            header('Location: /');
        } elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
            session_start();
            $params = [
              'picture_id' => $id
            ];
            var_dump($params);
            if ($this->order->save($params) === false) {
                $addResult = 'Картина не была добавлена в корзину';
            } else {
                $addResult = 'Картина добавлена в казину';
            }

            $data = [
                'title'=>'Добавление картины в карзину',
                'addResult' => $addResult,
                'auth' => isset($_SESSION['name'])
            ];
            //echo parent::renderPage('admin_account.php','template.php', $data);

        }
}



//конец класса
}
