<?php
require("./includes/header.php");
$database = new Database(); 

if(isset($_POST['submit'])){
    $data['name'] = $_POST['titre'];
    $data['description'] = $_POST['desc'];
    $database->add($data);
}
?>
<div style="width: 50%;" class="mx-auto d-block">
    <form action="" method="post">
        <div class="mt-5 ">
            <label class="form-label">Titre</label>
            <input type="text" name="titre" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="desc"  rows="8"></textarea>
        </div>

        <input type="submit" value="Ajouter" name="submit" class="btn btn-primary">
    </form>
</div>

<?php
require("./includes/footer.php")
?>