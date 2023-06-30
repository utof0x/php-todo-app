<?php

$connection = require_once './connection.php';

$connection-> setTodoStatus($_POST['id']);

header('Location: index.php');
