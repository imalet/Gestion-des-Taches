<?php
require('traitement.php');

// RECUPERATION DES TACHES DES EMPLOYES
$req = $db->prepare("SELECT * FROM tasks WHERE id_employe = :id ");
$req->bindParam(':id', $_SESSION['id']);
$req->execute();


$resultat = $req->fetchAll();


// SUPPRIMER UNE TACHE
if (isset($_POST['delete'])) {

    $req = $db->prepare("DELETE FROM tasks WHERE id = :id ");
    $req->bindParam(':id', $_POST['id']);
    $req->execute();

    header('location: taskdetails.php');
}

// MODIFIER UNE TACHE
if (isset($_POST['status'])) {

    $req = $db->prepare("UPDATE tasks SET statut = 'Termine' WHERE id = :id ");
    $req->bindParam(':id', $_POST['id']);
    $req->execute();

    header('location: taskdetails.php');
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Gestion de Mes Tâches</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: green;
            text-align: center;
            padding: 20px 0;
        }

        .task-container {

            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            width: 60%;
        }

        .benji {
            color: white;
        }

        .task-container h1 {
            font-size: 24px;
        }

        .task-container p {
            font-size: 16px;
        }

        .task-container .inline-elements {
            display: flex;
            justify-content: start;
            align-items: center;

        }

        .task-container .inline-elements p {
            margin: 0;
        }

        .task-container .red-button {
            background-color: red;
            color: white;
        }

        .task-container button {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 20px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <h1 class="benji">Details tach : Preparation d'un rapport de ventes</h1>

    </div>

    <?php foreach ($resultat as $key => $value) { ?>

        <div class="task-container">
            <form action="" method="post">
                <h1 class="lp"><?php echo $value['titre']  ?></h1>
                <p name="priorite">Priorité: <?php echo $value['priorite']  ?></p>
                <p>Statut: <?php echo $value['statut']  ?></p>
                <p>Description : <?php echo $value['description']  ?></p>
                <p><?php echo $value['description']  ?></p>
                <input type="text" name="id" value="<?php echo $value['id']  ?>" hidden>
                <div class="inline-elements">
                    <button name="status" type="submit">Statut terminé</button>
                    <button name="delete" type="submit" class="red-button">Supprimer la tâche</button>
                </div>
            </form>
        </div>

    <?php } ?>

</body>

</html>