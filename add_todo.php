<?php

$connection = require_once './connection.php';

$connection->addTodo($_POST);

header('Location: index.php');
