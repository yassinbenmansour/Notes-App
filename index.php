<?php

require('./database/database.php');
$database = new Database();

$data = array(
    'name' => 'Yassine benmansour',
    'description' => 'hello from yassine update ',
    'id' => '1'
);


$database->add($data);

?>