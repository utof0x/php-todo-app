<?php

$connection = require_once './connection.php';
$todos = $connection->getTodos();

$currentTodo = [
  'id' => '',
  'name' => '',
  'description' => '',
  'status' => 0,
];

if (isset($_GET['id'])) {
  $currentTodo = $connection->getTodoById($_GET['id']);
}
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
      <input type="hidden" name="id" value="<?php echo $currentTodo['id'] ?>" />
      <input
        class="new-todo-input"
        type="text"
        name="name"
        placeholder="Task name"
        value="<?php echo $currentTodo['name'] ?>"
      >
      <textarea
        class="new-todo-textarea"
        type="text"
        name="description"
        placeholder="Task description"
        value="<?php echo $currentTodo['description'] ?>"
      ></textarea>
      <button class="new-todo-button">
        <?php if ($currentTodo['id']): ?>
          Update TODO
        <?php else: ?>
          Create TODO
        <?php endif ?>
      </button>
    </form>
    <div class="todos">
      <?php foreach($todos as $todo):?>
        <div class="todo">
          <form class="status-form" action="set_status.php" method="post">
            <input type="hidden" name="id" value="<?php echo $todo['id']?>">
            <input class="status-input" type="checkbox" <?php echo $todo['status'] ? 'checked' : '' ?>>
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
            <a href="?id=<?php echo $todo['id']?>" class="edit-wrapper">
              <img class="edit-image" alt="Trash can" src="./edit.svg" />
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <script>
    document.querySelectorAll('.status-input').forEach(
      input => input.addEventListener('change', () => {input.parentElement.submit()})
    );
  </script>
</body>
</html>