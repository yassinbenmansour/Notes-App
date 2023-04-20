<?php
session_start();

require("./includes/header.php");
$data['id'] = $_GET['id'];
$note = $database->AffNote($data);

if (isset($_POST['submit'])){
    $data['name'] = $_POST['titre'];
    $data['description'] = $_POST['desc'];
    $database->delete($data);
}

?>
<div style="width: 50%;" class="mx-auto d-block">
    <form action="" method="post">
        <div class="mt-5 ">
            <label class="form-label">Titre</label>
            <input type="text" name="titre" value="<?php echo $note->name ?>" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="desc"  rows="8" readonly><?php echo $note->description ?></textarea>
        </div>

        <input type="submit" value="Delete" name="submit" class="btn btn-primary">
    </form>
</div>

<?php
require("./includes/footer.php")
?>