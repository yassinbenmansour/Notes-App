<?php

require('./database/database.php');
$database = new Database();

$data = array(
    'name' => 'Yassine benmansour',
    'description' => 'hello from yassine '
);


$database->add($data);

?>