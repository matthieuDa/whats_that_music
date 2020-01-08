<?php

// Connect functions ---------
include './../app.php';

// Data recovery -------------
$table = $_GET['element'];
$name  = $_GET['name'];

// Function call -------------
$new_element = add_element($name, $table);

// Result verification -------
// if (!$new_element) == error;

session_start();
echo('Valeur de $table -> ' + $table);
echo('Valeur de $name -> ' + $name);
?>