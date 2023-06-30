<?php

$connection = require_once './connection.php';

$id = $_POST['id'] ?? '';
if($id) {
  $connection->updateTodo($id, $_POST);
} else {
  $connection->addTodo($_POST);
}
header('Location: index.php');
