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
        $id = $data['id'];
        $name = $data['name'];
        $description = $data['description'];

        try {
            $sql = "UPDATE  Notes SET name=:name,description=:description WHERE id = :id";

            // $sql = "INSERT into Notes (name,description,created) VALUES (:name,:description,now())";
            $state = $this->db->prepare($sql);
            $state->execute(array(
                ":name" => $name,
                ":description" => $description,
                ":id" => $id

            ));

            if($state){
                 // echo "Note Ajoutée";
                echo "Note Modifiée";

            }
        } catch (PDOException $exp) {
            echo "error" . $exp->getMessage();
        }
    }
}