<?php

if (isset($_POST['status'])) {

    // SUPPRIMER UNE TACHE
    $req = $db->prepare("DELETE FROM tasks WHERE id = :id ");
    $req->bindParam(':id', $_POST['id']);
    $req->execute();

} elseif (isset($_POST['delete'])) {
    echo "Delete";
}