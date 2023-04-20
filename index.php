<?php
require("./includes/header.php");
$database = new Database();
?>



<div class="container">
    <div class="row mt-4">
        <div class="co-md-6 mx-auto">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Titre </th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $database->AffNotes(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <a href="add.php" class="btn btn-primary">Ajouter</a>
</div>










<?php
require("./includes/footer.php");
?>