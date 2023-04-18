<?php

require('./database/database.php');
$database = new Database();

$data = array(
    'name' => 'sara benmansour',
    'description' => 'hello from sara  ',
);


$database->add($data);

?>