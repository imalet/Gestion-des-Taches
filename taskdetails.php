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
        <h1 class="leye">Details tach : Preparation d'un rapport de ventes</h1>
        
    </div>

    <div class="task-container">
        <h1 class="lp">Préparation d'un Rapport de Vente</h1>
        <p>Priorité: Haute</p>
        <p>Statut: En cours</p>
        <p>Recueillir les données de vente, générer des graphiques et rédiger un rapport détaillé.</p>
        <div class="inline-elements">
              <button>Statut terminé</button>
            <button class="red-button">Supprimer tâche</button>
        </div>
    </div>

</body>

</html>