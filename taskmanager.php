<?php
session_start();
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

        .lop {
            margin-left: 19%;
        }

        .navbar {
            background-color: green;
            text-align: center;
            padding: 10px 0;
            color: #f0f0f0;
        }

        .task-container {
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            width: 60%;
        }

        .leye {
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
            margin: 0px 20px 0px 0px;
        }

        .task-container button {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Style du formulaire */
        .task-form {
            margin-top: 20px;
            text-align: left;
            width: 61%;
            margin-left: 19%;
        }

        .task-form label {
            font-size: 18px;
        }

        .task-form select,
        .task-form input[type="text"],
        .task-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .task-form button {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <h1 class="leye">Gestion de Mes Tâches</h1>
        <p><?php  echo $_SESSION['nom']  ?></p>
    </div>

    <div class="task-container">
        <h1 class="lp">Préparation d'un Rapport de Vente</h1>
        <p>Recueillir les données de vente, générer des graphiques et rédiger un rapport détaillé.</p>
        <div class="inline-elements">
            <p>Priorité: Haute</p>
            <p>Statut: En cours</p>
            <button>Voir les détails</button>
        </div>
    </div>

    <!-- <div class="task-container">
        <h1 class="lp">Préparation d'un Rapport de Vente</h1>
        <p>Recueillir les données de vente, générer des graphiques et rédiger un rapport détaillé.</p>
        <div class="inline-elements">
            <p>Priorité: Haute</p>
            <p>Statut: En cours</p>
            <button>Voir les détails</button>
        </div>
    </div> -->

    <h1 class="lop">Ajouter une Nouvelle Tâche</h1>
    <div class="task-form">
        <form action="traitement.php" method="post">
            <label for="titre">Titre:</label>
            <input type="text" id="titre" name="titre">
            <label for="priorite">Priorité:</label>
            <select id="priorite" name="priorite">
                <option value="Haute">Haute</option>
                <option value="Moyenne">Moyenne</option>
                <option value="Basse">Basse</option>
            </select>
            <label for="statut">Statut:</label>
            <select id="Statut" name="statut">
                <option value="A Faire">A Faire</option>
                <option value="En Cours">En Cours</option>
                <option value="Terminer">Terminer</option>
            </select>
            <label for="date">Date d'echeance</label>
            <input type="date" name="date"> <br> <br>
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4"></textarea>
            <button type="submit" name="addTask">Envoyer</button>
        </form>
    </div>
</body>

</html>