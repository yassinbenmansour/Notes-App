<?php

class Database
{

    private $db;

    function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=Noteapp", "root", "");
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
                ":description" => $description,

            ));

            if ($state) {
                echo "Note Ajoutée";
            }
        } catch (PDOException $exp) {
            echo "error" . $exp->getMessage();
        }
    }

    public function update($data)
    {
        $id = $data['id'];
        $name = $data['name'];
        $description = $data['description'];

        try {
            $sql = "UPDATE  Notes SET name=:name,description=:description WHERE id = :id";

            $state = $this->db->prepare($sql);
            $state->execute(array(
                ":name" => $name,
                ":description" => $description,
                ":id" => $id

            ));

            if ($state) {
                echo "Note Modifiée";
            }
        } catch (PDOException $exp) {
            echo "error" . $exp->getMessage();
        }
    }

    public function delete($data)
    {
        $id = $data['id'];
        

        try {

            $sql = "DELETE  FROM  Notes WHERE id = :id";

            $state = $this->db->prepare($sql);
            $state->execute(array(
                ":id" => $id

            ));

            if ($state) {

                echo "Note Supprimée";
            }
        } catch (PDOException $exp) {
            echo "error" . $exp->getMessage();
        }
    }
}
