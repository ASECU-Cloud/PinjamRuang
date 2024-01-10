<?php
class ormawa
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getOrmawa()
  {
    $query = "SELECT *
    FROM organisasi ";

    $this->db->query($query);
    return $this->db->resultSet();
  }
}
