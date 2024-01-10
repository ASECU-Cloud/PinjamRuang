<?php

class ruangan
{

  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }


  public function getRuangan()
  {
    $query = 'SELECT * FROM `ruangan`';
    $this->db->query($query);
    return $this->db->resultSet();
  }
}
