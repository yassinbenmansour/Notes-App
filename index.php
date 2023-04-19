<?php
require("./includes/header.php");
$database = new Database();
?>



<div class="container">
    <div class="row mt-4">
        <div class="co-md-6 mx-auto">
            <div class="card border-primary">
                <div class="cart-body">
                    <table class="table">
                            <thead>
                                <tr>
                                    <th>Titre </th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $database->AffNotes();?>
                            </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>










<?php
require("./includes/footer.php");
?>