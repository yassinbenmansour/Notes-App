<?php
if(isset($_SESSION['added'])){
    echo "<div class='alert alert-success'>".$_SESSION['added']."</div>";
    session_destroy();
}
if(isset($_SESSION['mo'])){
    echo "<div class='alert alert-warning'>".$_SESSION['mo']."</div>";
    session_destroy();

}
if(isset($_SESSION['de'])){
    echo "<div class='alert alert-danger'>".$_SESSION['de']."</div>";
    session_destroy();

}

?>