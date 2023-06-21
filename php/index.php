<?php
session_start()
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include './includes/head.inc.html'
    ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqylQvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.1.3/dist/vapor/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.1.3/dist/morph/bootstrap.min.css"> -->
</head>


<body>

    <?php include './includes/header.inc.html' ?>

    <div class="container">
        <div class="row">


            <nav class="col-md-3 mt-3">
                <a href="?page=index.php"><button type="button" class="btn btn-secondary">Home</button></a>
                <!-- Si $_SESSION['table'] est défini alors affiche la liste -->
                <?php
                if (isset($_SESSION['table']))
                    include_once './includes/ul.inc.php';

                ?>
            </nav>

            <section class="col-md-9 mt-3">

                <?php if (!isset($_GET['add'])) {
                    echo '<a href="index.php?add"> <button type="button" class="btn btn-primary btn">Ajouter des données</button></a>';
                } ?>

                <?php if (!isset($_GET['addmore'])) {
                    echo ' <a href="index.php?addmore"> <button type="button" class="btn btn-light">Ajouter plus de données</button></a>';
                } ?>

                <!-- Si add est défini alors on ajoute le formulaire -->
                <?php
                if (isset($_GET['add'])) {
                    include_once './includes/form.inc.html';
                }

                if (isset($_GET['addmore'])) {
                    include './includes/form2.inc.php';
                } elseif (isset($_POST['form']) || (isset($_POST['form2']))) {

                    $table['prenom_user'] =  $_POST['prenom_user'];
                    $table['nom_user'] = $_POST['nom_user'];
                    $table['age_user'] = $_POST['age_user'];
                    $table['taille_user'] = $_POST['taille_user'];
                    $table['genre_user'] = $_POST['genre_user'];


                    if (isset($_POST['couleur_user'])) {
                        $table['couleur_user'] = $_POST['couleur_user'];
                    }

                    if (isset($_POST['date_user'])) {
                        $table['date_user'] = $_POST['date_user'];
                    }

                    if (isset($_POST['HTML'])) {
                        $table['HTML'] =  $_POST['HTML'];
                    }

                    if (isset($_POST['CSS'])) {
                        $table['CSS'] =  $_POST['CSS'];
                    }

                    if (isset($_POST['JavaScript'])) {
                        $table['JavaScript'] =  $_POST['JavaScript'];
                    }

                    if (isset($_POST['PHP'])) {
                        $table['PHP'] =  $_POST['PHP'];
                    }

                    if (isset($_POST['MYSQL'])) {
                        $table['MYSQL'] =  $_POST['MYSQL'];
                    }

                    if (isset($_POST['Bootstrap'])) {
                        $table['Bootstrap'] =  $_POST['Bootstrap'];
                    }

                    if (isset($_POST['Symfony'])) {
                        $table['Symfony'] =  $_POST['Symfony'];
                    }

                    if (isset($_POST['React'])) {
                        $table['React'] =  $_POST['React'];
                    }



                    if (isset($_FILES['img'])) {
                        // echo '<pre>';
                        // print_r($_POST);
                        // print_r($_FILES);
                        // var_dump($_FILES);
                        // echo '</pre>';

                        // Récupèrer les informations spécifiques du fichier.
                        $tmpName = $_FILES['img']['tmp_name'];
                        $type = $_FILES['img']['type'];
                        $name = $_FILES['img']['name'];
                        $size = $_FILES['img']['size'];
                        $error = $_FILES['img']['error'];

                        // On extrait l'extension du fichier avec la méthode explode et on la convertie en minuscules
                        $Extension = explode('.',  $name);
                        $extensionLower = strtolower(end($Extension));

                        $extensions = ['jpg', 'png'];

                        $maxSize = 200000;

                        // Si l'extension et la taille sont bonne alors on uploaded le fichier dans le dossier uploaded
                        if (in_array($extensionLower, $extensions) && $size <= $maxSize) {
                            move_uploaded_file($tmpName, './uploaded/' . $name);
                        } else {
                            echo "L'extension ou la taille est mauvaise";
                        }

                        $table['img'] = array(
                            'tmp_name' => $tmpName,
                            'type' => $type,
                            'name' => $name,
                            'size' => $size,
                            'error' => $error
                        );
                    }

                    if (!is_numeric($_POST['age_user'])) {
                        echo "<h>L'age doit être un nombre</h>";
                        session_destroy();
                    } elseif (!is_numeric($_POST['taille_user'])) {
                        echo "<h>la taille doit être un nombre</h>";
                        session_destroy();

                        // Si les vérifications sont bonnes on stock les données dans la session ['table] et on affiche un message
                    } else {
                        $_SESSION['table'] = $table;
                        echo ' <div class="alert alert-dismissible alert-success mt-3">
                        <strong class="d-flex justify-content-center">Données sauvegardées</strong>
                        </div>';
                    }
                }

                if (isset($_GET['debugging'])) {
                    echo '<h1> Débogage </h1>';
                    echo '<pre>';
                    print_r($_SESSION['table']);
                    echo '<pre>';
                } elseif (isset($_GET['concatenation'])) {

                    $tab = $_SESSION['table'];
                    function genre($tab)
                    {
                        if ($tab['genre_user'] === "Homme") {
                            echo "Mr";
                        } else {
                            echo "Mme";
                        }
                    }
                    echo "<h1 class='d-flex justify-content-center' >Concaténation</h1> <br>
                            <h3> ===> Construction d'une phrase avec le contenu du tableau</h3>";

                    echo genre($tab) .  " " . $_SESSION['table']['prenom_user'] . " " .  $_SESSION['table']['nom_user'];
                    echo " <br> j'ai " . $_SESSION['table']['age_user'] . " ans et je mesure "  . $_SESSION['table']['taille_user'] . " m. <br> <br>";

                    echo "<h3> ===> Construction d'une phrase après MAJ du tableau</h3>";
                    $nom_user_maj = strtoupper($_SESSION['table']['nom_user']);
                    echo genre($tab) .  " " . $_SESSION['table']['prenom_user'] . " " . $nom_user_maj . "<br>";
                    echo "j'ai " . $_SESSION['table']['age_user'] . " ans et je mesure "  . $_SESSION['table']['taille_user'] . " m. <br> <br>";

                    echo "<h3> ===> Affichage d'une virgule à la place du point pour la taille</h3>";

                    $taille_user_maj = str_replace(".", ",", $_SESSION['table']['taille_user']);
                    echo genre($tab) . " " . $_SESSION['table']['prenom_user'] . " " . $nom_user_maj . "<br>
                        j'ai " . $_SESSION['table']['age_user'] . " ans et je mesure " . $taille_user_maj . "m.";
                } elseif (isset($_GET['loop'])) {
                    echo "<h1> ===> Lecture du tableau à l'aide d'une boucle foreach</h1>
                    <br> <br>";

                    $n = 0;
                    foreach ($_SESSION['table'] as $key => $value) {
                        if ($key != 'img') {
                            echo "à la ligne n°" . $n++ . " correspond la clé " . $key . " et contient " . $value . "<br>";
                        } else {
                            echo "à la ligne n°" . $n++ . " correspond la clé " . $key . " et contient <br>";
                            echo "<img class='mw-100 mt-2' src='./uploaded/" . $value['name'] . "' alt='Image " . $value['name'] . "'><br><br>";
                        }
                    }
                } elseif (isset($_GET['function'])) {
                    echo "<h1> ===> J'utilise ma function Readtable()</h1>
                    <br> <br>";
                    function readTable()
                    {
                        $n = 0;
                        foreach ($_SESSION['table'] as $key => $value) {
                            if ($key != 'img') {
                                echo "à la ligne n°" . $n++ . " correspond la clé " . $key . " et contient " . $value . "<br>";
                            } else {
                                echo "à la ligne n°" . $n++ . " correspond la clé " . $key . " et contient <br>";
                                echo "<img class='mw-100 mt-2' src='./uploaded/" . $value['name'] . "' alt='Image " . $value['name'] . "'><br><br>";
                            }
                        }
                    }
                    readTable();
                } elseif (isset($_GET['del'])) {
                    session_destroy();
                    echo '
                    <div class="alert alert-dismissible alert-info mt-3">
                        <strong class="d-flex justify-content-center">Données supprimées</strong>
                    </div>
                    ';
                ?>
                    <!-- Refresh la page au bout de 1.3 secondes et retourne à la racine -->
                    <meta http-equiv="refresh" content="1.3; URL=/index.php">

                <?php
                }
                ?>

            </section>
        </div>
    </div>

    <?php include './includes/footer.inc.html' ?>

</body>