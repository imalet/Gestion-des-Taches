<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;

        }

        input {
            width: 60%;
        }

        .navbar {
            background-color: green;
            text-align: center;
            padding: 20px 0;
        }

        .navbar h1 {
            color: white;
            margin: 0;
            font-size: 24px;
        }

        .container {
            display: flex;
            justify-content: space-around;
            margin: 20px;
            width: 50%;
            margin-left: 25%;

        }

        .form-container {
            background-color: white;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 45%;
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 60%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 10px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: darkgreen;
        }

        .login-form {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <h1>Création de compte et Connexion</h1>
    </div>
    <div class="container">
        <div class="form-container">
            <h2>Connexion</h2>
            <form action="traitement.php" method="post">

                <div>
                    <label for="login-email">Email :</label><br>
                    <input type="email" id="login-email" name="login-email" required>
                </div>
                <div>
                    <label for="login-pwd">Mot de passe :</label><br>
                    <input type="password" id="login-pwd" name="login-pwd" required>
                </div>
                <a href="reset.php">Mot de passe oublié</a>
                <button name="login" type="submit">Se Connecter</button>
            </form>
        </div>
        <hr>
        <div class="form-container">
            <h2>Inscription</h2>
            <form action="traitement.php" method="post">
                <div>
                    <label for="nom">Nom :</label> <br>
                    <input type="text" id="nom" name="nom" required>
                </div>
                <div>
                    <label for="email">Email :</label> <br>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="motdepasse">Mot de passe :</label> <br>
                    <input type="password" id="motdepasse" name="pwd" required>
                </div>
                
                <button name="enregistrer" type="submit">S'Inscrire</button>
            </form>
        </div>
    </div>
</body>

</html>