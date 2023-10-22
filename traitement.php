<?php
session_start();

// Session pour l'id
if (!isset($_SESSION['id'])) {
    $_SESSION['id'];
}
// Session pour le nom
if (!isset($_SESSION['nom'])) {
    $_SESSION['nom'];
}
//Sessio pour l'email
if (!isset($_SESSION['email'])) {
    $_SESSION['email'];
}


try {
    //Connextion a la base
    $db = new PDO('mysql:host=localhost;dbname=gestiontache', 'root', '');

    // INSCRIPTION
    if (isset($_POST['enregistrer'])) {

        $nom = $_POST['nom'];
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $pwd = hash('sha256', $_POST['pwd']);

        if (empty($_POST['nom']) || !preg_match('/^[A-Za-z]+$/', $nom)) {
            echo "Veuillez entrer correctement votre nom";
        } elseif (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL) === true) {
            echo "Veuillez entrer correctement votre Email";
        } else {

            // Verification si il existe cette email dans la base de donnee
            $select = $db->prepare("SELECT * FROM employees WHERE email = :email");
            $select->bindParam(':email', $email);
            $select->execute();

            $resultat = $select->fetch(PDO::FETCH_ASSOC);


            if ($resultat !== false) {
                echo "L'email existe déjà. Veuillez rentrer un autre email.";
            } else {

                // Insertion dans la base de donnee
                $req = $db->prepare("INSERT INTO employees(nom, email, pwd) VALUES(:nom, :email, :pwd)");
                $req->bindParam(':nom', $nom);
                $req->bindParam(':email', $email);
                $req->bindParam(':pwd', $pwd);

                $req->execute();

                header('location:login.php');
            }
        }
    }
    // CONNEXION
    if (isset($_POST['login'])) {
        $email = filter_var($_POST['login-email'], FILTER_SANITIZE_EMAIL);
        $pwd = hash('sha256', $_POST['login-pwd']);

        if (empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            echo "Veuillez entrer un bon email";
        } else {

            $req = $db->prepare("SELECT * FROM employees WHERE email = :email ");
            $req->bindParam(':email', $email);
            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_ASSOC);


            if ($resultat !== false) {

                if ($resultat['email'] === $email && $resultat['pwd'] === $pwd) {

                    $_SESSION['id'] = $resultat['id'];
                    $_SESSION['nom'] = $resultat['nom'];
                    $_SESSION['email'] = $resultat['email'];

                    header('location: taskmanager.php');
                } else {
                    echo "l'email et le mot de passe de correspond pas !";
                }
            } else {
                echo "Nous n'avons pas de resultat";
            }
        }
    }
    // AJOUT DES TACHES
    if (isset($_POST['addTask'])) {

        $titre = htmlspecialchars($_POST['titre']);
        $priorite = htmlspecialchars($_POST['priorite']);
        $statut = htmlspecialchars($_POST['statut']);
        $description = htmlspecialchars($_POST['description']);
        $date = $_POST['date'];

        $toDay = date('Y-m-d');
        $limitDate = '2030-01-01';


        if (!preg_match('/^[A-Za-z]{2,}/', $titre)) {
            echo "Entrez un titre valide";
        } elseif (!preg_match('/^(Haute|Moyenne|Basse)/', $priorite)) {
            echo "Entrez une priorite valide";
        } elseif (!preg_match('/^(A Faire|En Cours|Termine)/', $statut)) {
            echo "Entrez une etat de la tache valide";
        } elseif (empty($description)) {
            echo "Entrez une description de la tache";
        } elseif (!preg_match('/^[0-9]{4}+-[0-9]{2}+-[0-9]{2}/', $date)) {
            echo "Veuillez inserer une date conforme";
        } else {

            $req = $db->prepare("INSERT INTO tasks(titre, priorite, statut, description, id_employe, date) VALUES(:titre, :priorite, :statut, :description, :id_employe, :date)");

            $req->bindParam(':titre', $titre);
            $req->bindParam(':priorite', $priorite);
            $req->bindParam(':statut', $statut);
            $req->bindParam(':description', $description);
            $req->bindParam(':id_employe', $_SESSION['id']);
            $req->bindParam(':date', $date);


            if ($req->execute()) {
                echo "Good";
            } else {
                echo "Bad";
            }
        }
    }
    
} catch (PDOException $e) {
    echo "Faile Connexion" . $e->getMessage();
}
