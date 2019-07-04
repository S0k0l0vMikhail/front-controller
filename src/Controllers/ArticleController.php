<?php
namespace Web\FrontController\Controllers;

use Web\FrontController\Core\Controller;
use Web\FrontController\Models\ArticleRepository;

class ArticleController extends Controller
{

      private $articleRepository;
      public function __construct()
      {
          $this->articleRepository = new ArticleRepository();
      }

      public function addAction(){
      if ($_SERVER['REQUEST_METHOD'] == 'GET'){
          header('Location: /');
      } else
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              session_start();
          // если post запрос, обрабатываем данные
          $post = $_POST;
          $files = $_FILES;
          $params = [
              'title' => $post['title'],
              'description' => $post['description'],
              'yearCreated' => explode("-", $post['yearCreated'])[0],
          ];
          if ($this->articleRepository->save($params) === false) {
              $addResult = 'Статья не была добавлена';
          } else {
              $addResult = 'Статья добавлена';
          }

          $data = [
              'title'=>'Добавление статьи',
              'addResult' => $addResult,
              'auth' => isset($_SESSION['name'])
          ];
          echo parent::renderPage('admin_account.php',
              'template.php', $data);

      }

  }

    public function showAction(){
//        echo "Генерация страницы статей";
      session_start();
        $articles = $this->articleRepository->getAll();
        //var_dump($article);
        $data = [
            'title'=>$articles['title'],
            'articles'=>$articles,
            'auth' => isset($_SESSION['name'])
        ];
        echo parent::renderPage('article.php',
            'template.php', $data);
    }

}
