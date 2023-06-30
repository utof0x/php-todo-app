<?php

$connection = require_once './connection.php';
$todos = $connection->getTodos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>PHP TODO App</title>
</head>
<body>
  <div class="content">
    <h1 class="title">TODO app</h1>
    <form class="new-todo-form" action="add_todo.php" method="post">
      <input class="new-todo-input" type="text" name="name" placeholder="Task name">
      <textarea class="new-todo-textarea" type="text" name="description" placeholder="Task description" ></textarea>
      <button class="new-todo-button">Create task</button>
    </form>
    <div class="todos">
      <?php foreach($todos as $todo):?>
        <div class="todo">
          <form class="status-form">
            <input type="checkbox" checked>
          </form>
          <div>
            <h3 class="todo-name"><?php echo $todo['name']?></h3>
            <div class="todo-description"><?php echo $todo['description']?></div>
            <form class="delete-form" action="delete_todo.php" method="post">
              <input type="hidden" name="id" value="<?php echo $todo['id']?>">
              <button class="delete-button">
                <img class="delete-image" alt="Trash can" src="./trash-can.svg" />
              </button>
            </form>
            <a href="" class="edit-wrapper">
              <img class="edit-image" alt="Trash can" src="./edit.svg" />
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>
</html>