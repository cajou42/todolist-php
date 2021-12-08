<?php session_start(); ?>
<!DOCTYPE html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<body>
    <form class="formulaire" name="form" method="post">
        <div class="in_formilaire">
            <label>nom
            <input type="text" name="nom" required>
            </label>
            <br>
            <label>mot de passe
            <input type="password" name="mot_de_passe" required>
            </label>
            <br>
            <button type="submit">submit</button>
            <?php
            if (isset($_POST['nom']) && isset($_POST['mot_de_passe'])) {
                $value = $_POST['nom'];
                $_SESSION["connected"]= true;
                $_SESSION["name"]= $_POST['nom'];
                echo "connected !";
            } 
            //else {
            //     echo "not alu";
            // }
            ?>
        </div>
    </form>
    <a href="/tp_note/create.php">&larr; Back to register</a>
    <br>
    <a href="/tp_note/todo.php">go to the todo list</a>
</body>