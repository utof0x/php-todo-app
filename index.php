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
    <form class="new-todo-form">
      <input class="new-todo-input" type="text" name="" placeholder="Task name">
      <textarea class="new-todo-textarea" type="text" name="" placeholder="Task description" ></textarea>
      <button class="new-todo-button">Create task</button>
    </form>
    <div class="todos">
      <div class="todo">
        <form class="status-form">
          <input type="checkbox" checked>
        </form>
        <div>
          <h3 class="todo-name">Name example</h3>
          <div class="todo-description">description example</div>
          <form class="delete-form">
            <button class="delete-button">
              <img class="delete-image" alt="Trash can" src="./trash-can.svg" />
            </button>
          </form>
          <a href="" class="edit-wrapper">
            <img class="edit-image" alt="Trash can" src="./edit.svg" />
          </a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>