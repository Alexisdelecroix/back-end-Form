<?php session_start() ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include './includes/head.inc.html'
    ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.1.3/dist/spacelab/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.1.3/dist/morph/bootstrap.min.css"> -->
</head>


<body>
    <?php
    include './includes/header.inc.html'
    ?>
    <div class="container-fluid">
        <div class="row">


            <nav class="col-md-3 mt-3">



                <a href="?page=index.php"><button type="button" class="btn btn-secondary">Home</button></a>


                <?php if (!isset($_GET['pname'])) {
                    echo '<a href="?pname=form.inc.html"> <button type="button" class="btn btn-primary btn">Ajouter des données</button></a>';
                } ?>
                <?php
                if (isset($_SESSION['table']))
                    include_once './includes/ul.inc.php';

                ?>

            </nav>



            <section class="col-md-9 mt-3">
                <?php
                // si le paramétre url (pname) est définie(isset), alors include l'url
                if (isset($_GET['pname'])) {
                    include_once './includes/form.inc.html';
                } elseif (isset($_POST['form'])) {
                    $table = [
                        'prenom_user' => $_POST['prenom_user'],
                        'nom_user' => $_POST['nom_user'],
                        'age_user' => $_POST['age_user'],
                        'taille_user' => $_POST['taille_user'],
                        'genre_user' => $_POST['genre_user'],

                    ];
                    $_SESSION['table'] = $table;
                    echo '<div class="alert alert-dismissible alert-success">
                    <strong class="d-flex justify-content-center">Données sauvegardées</strong>
                    </div>';
                } elseif (isset($_SESSION['table']))

                    if (isset($_GET['debugging'])) {
                        echo '<h2> Débogage </h2>';
                        echo '<pre>';
                        print_r($_SESSION['table']);
                        echo '<pre>';
                    } elseif (isset($_GET['concatenation'])) {
                        function genre($table)
                        {
                            if ($table['genre_user'] === "Homme") {
                                echo "Mr";
                            } else {
                                echo "Mme";
                            }
                        }
                        echo "<h1 class='d-flex justify-content-center' >Concaténation</h1> <br>
                            <h3> ===> Construction d'une phrase avec le contenu du tableau</h3>";

                        echo "<p> coucou" . $_SESSION['table']['prenom_user'] .  $_SESSION['table']['nom_user']. "</p>";

                    
                    } elseif (isset($_GET['loop'])) {
                        echo "<h2> ===> Lecture du tableau à l'aide d'une boucle foreach</h2>
                    <br> <br>";
                        $n = 0;
                        foreach ($_SESSION['table'] as $key => $value) {
                            echo "à la ligne n°" . $n++ . " correspond la clé " . $key . " et contient " . $value . "<br>";
                        }
                    } elseif (isset($_GET['del'])) {
                        session_destroy();
                        echo '
                    <div class="alert alert-dismissible alert-info">
                        <strong class="d-flex justify-content-center">Données supprimées</strong>
                    </div>
                    ';
                ?>
                    <!-- Refresh la page au bout de 1.3 secondes et retourne à la racine -->
                    <meta http-equiv="refresh" content="1.3; URL=/index.php">

                <?php
                    } elseif (isset($_GET['pname'])) {
                        $page = $_GET['pname'];

                        if ($page === 'form.inc.html') {

                            include './includes/form.inc.html';
                        }
                    }

                ?>

            </section>
        </div>
    </div>
    <?php
    include './includes/footer.inc.html'
    ?>
</body>