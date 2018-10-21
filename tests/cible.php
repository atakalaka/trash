<!DOCTYPE HTML>
<?php session_start();?>
<html>
    <head>
        <title>Kindle notes parser</title>
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
        <!-- -->
    </head>

    <body>
        <p>Bonjour !</p>
        <?php
        // print_r($_SESSION['donnee_test']);
        // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
            if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
                {
                echo 'Nous avons trouvé un fichier au nom de ' . $_FILES['monfichier']['name'] . '. <br>';
                // Testons si le fichier n'est pas trop gros
                if ($_FILES['monfichier']['size'] <= 2000000)
                    {
                        echo 'Le fichier fait moins de 2Mo. <br>';
                        $infosfichier = pathinfo($_FILES['monfichier']['name']);
                        $extension_upload = $infosfichier['extension'];
                        if ($extension_upload == 'html' | $extension_upload == 'txt')
                            {
                            echo "Le fichier est bien un HTML.<br>";
                             
                            // print_r($_FILES);
                            move_uploaded_file( $_FILES['monfichier']['tmp_name'], 'uploaded_files/'.$_FILES['monfichier']['name'] );
                            $monfichier = fopen('uploaded_files/'.$_FILES['monfichier']['name'], 'r'); //On ouvre le fichier pour travailler dessus. 
                            $content = stream_get_contents($monfichier, -1, -1); //lit la ressource envoyée par fopen
                            fclose($monfichier); //On ferme le fichier 
                            // libxml_use_internal_errors(true);
                            $dom = new DOMDocument();
                            $dom->loadHTMLFile('uploaded_files/'.$_FILES['monfichier']['name']);
                            $book_title = $dom->getElementsByTagName('bookTitle');
                            print_r ($book_title);
                            // echo $dom->saveHTML();
                            // // print $dom->saveHTML();
                            // print_r($dom);
                            // $book_title = $dom->getElementsByTagName('bookTitle');
                            // print_r($book_title);
                            // echo('book title'.$book_title[0]);                            
                            } else { echo 'Le fichier n\' est pas html. ';}
                    } else { echo 'Le fichier fait plus de 2Mo. Il est trop volumineux pour notre humble serveur. ';}
                } else { echo 'Pas de fichier trouvé'; }
        ?>
    </body>
    <footer>
        <a href="list_of_sheets.php">Go to my uploaded vocabulary sheets.</a> 
    </footer>
</html>