<?php
    // On démarre la session AVANT d'écrire du code HTML
    session_start();
    // $_SESSION['donnee_test']='le test marche ! '
    // print_r($_SESSION);
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Kindle notes parser</title>
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
        <!-- -->
    </head>
    <div id="face"></div>
    <body>
        <form action="cible.php" method="post" enctype="multipart/form-data">
            <p>
                Formulaire d'envoi de fichier :<br />
                    <input type="file" name="monfichier" /><br />
                    <input type="submit" value="Envoyer le fichier" />
            </p>
        </form>
    </body>
</html>

