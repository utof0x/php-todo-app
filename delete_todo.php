<?php

$connection = require_once './connection.php';

$connection-> deleteTodo($_POST['id']);

header('Location: index.php');
