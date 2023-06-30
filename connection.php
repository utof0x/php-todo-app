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

  public function addTodo($todo)
  {
    $statement = $this->pdo->prepare("INSERT INTO todos (name, description, creation_date) VALUES (:name, :description, :creation_date)");
    $statement->bindValue('name', $todo['name']);
    $statement->bindValue('description', $todo['description']);
    $statement->bindValue('creation_date', date('Y-m-d H:i:s'));
    return $statement->execute();
  }

  public function deleteTodo($id)
  {
    $statement = $this->pdo->prepare("DELETE FROM todos WHERE id = :id");
    $statement->bindValue('id', $id);
    return $statement->execute();
  }

  public function setTodoStatus($id)
  {
    $statement = $this->pdo->prepare("UPDATE todos SET status = NOT status WHERE id = :id");
    $statement->bindValue('id', $id);
    return $statement->execute();
  }

  public function updateTodo($id, $todo)
  {
    $statement = $this->pdo->prepare("UPDATE todos SET name = :name, description = :description WHERE id = :id");
    $statement->bindValue('id', $id);
    $statement->bindValue('name', $todo['name']);
    $statement->bindValue('description', $todo['description']);
    return $statement->execute();
  }

  public function getTodoById($id)
  {
    $statement = $this->pdo->prepare("SELECT * FROM todos WHERE id = :id");
    $statement->bindValue('id', $id);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }
}

return new Connection();