<?php

namespace Web\FrontController\Models;

use Web\FrontController\Core\DB;
use Web\FrontController\Core\Repository;

class Order implements Repository
{


  private $db;
  public function __construct()
  {
      $this->db = DB::getDB();
  }

  public function getAll()
  {
      // возвращает все картины
      $sql = 'SELECT * FROM article';
      return $this->db->getAll($sql);
  }

  public function getById(int $id)
  {
      // получаем картину по id
      $sql = 'SELECT * FROM article WHERE id=:id';
      $params = ['id'=>$id];
      return $this->db->paramsGetOne($sql, $params);
  }

  public function save($params)
  {
      $sql = 'INSERT INTO PicBasc (picture_id) VALUES (:picture_id)';
      return $this->db->nonSelectQuery($sql, $params);
  }
  //конец класса
}
