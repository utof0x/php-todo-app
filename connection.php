<?php

class Connection {
  public PDO $pdo;

  public function __construct() {
    $this->pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=sql_todo", "root");
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function getTodos()
  {
    $statement = $this->pdo->prepare("SELECT * FROM todos ORDER BY creation_date DESC");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
}

return new Connection();