<?php

class Database {

    private $db;

    function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=Noteapp","root", "");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function add($data)
    {
        $name = $data['name'];
        $description = $data['description'];

        try {
            $sql = "INSERT into Notes (name,description,created) VALUES (:name,:description,now())";
            $state = $this->db->prepare($sql);
            $state->execute(array(
                ":name" => $name,
                ":description" => $description
            ));
            
            if($state){
                echo "Note Ajoutée";
            }
        } catch (PDOException $exp) {
            echo "error" . $exp->getMessage();
        }
    }
}