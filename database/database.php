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
                $_SESSION['added'] = "Note Ajoute";
                $this->redirect('index.php');
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
                $_SESSION['mo'] = "Note Modifier";
                $this->redirect('index.php')   ;
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
                $_SESSION['de'] = "Note supprimee";
                $this->redirect('index.php');
            }
        } catch (PDOException $exp) {
            echo "error" . $exp->getMessage();
        }
    }



    public function AffNotes()
    {
        try {

            $sql = "SELECT * FROM  Notes ";
            $state = $this->db->query($sql);
            while ($note = $state->fetch(PDO::FETCH_OBJ)) {
                $output = "
                    <tr>
                        <td>
                            $note->name
                        </td>
                        <td>
                            $note->description
                        </td>
                        <td>
                            <a href='update.php?id=$note->id' class='btn btn-sm btn-warning'>Modifier</a>
                            <a href='delete.php?id=$note->id' class='btn btn-sm btn-danger'>Supprimée</a>
                        </td>
                    </tr>
                ";
                echo $output ;
            }
        } catch (PDOException $exp) {
            echo "error" . $exp->getMessage();
        }
    }

    public function AffNote($data)
    {
        $id = $data['id'];

        try {

            $sql = "SELECT * FROM  Notes WHERE id = :id";
            $state = $this->db->prepare($sql);
            $state->execute(array(
                ":id" => $id

            ));


            $note = $state->fetch(PDO::FETCH_OBJ);

            return($note);

           
        } catch (PDOException $exp) {
            echo "error" . $exp->getMessage();
        }
    }



    public function redirect($page){
        header("location:".$page);
    }

}
