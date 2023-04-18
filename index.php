<?php

require('./database/database.php');
$database = new Database();

$data = array(
    'id' => 2
);


$database->AffNote($data);

?>