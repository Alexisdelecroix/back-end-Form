 <h1 class="d-flex justify-content-center">Ajouter plus de données</h1>

<!-- <div class="container-fluid"> -->
<form class="row" action="../index.php" method="post" enctype="multipart/form-data">


    <fieldset class="col-md-7">
        <div class="form-group">
            <label for="prenom" class="form-label mt-4"></label>
            <input type="text" name="prenom_user" class="form-control" id="prenom" placeholder="Prénom" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label mt-4"></label>
            <input type="text" name="nom_user" class="form-control" id="name" placeholder="Nom" required>
        </div>
        <div class="form-group">
            <label for="age" class="form-label mt-4">Age (18 a 70 ans)</label>
            <input type="number" name="age_user" class="form-control" id="age" placeholder="Renseignez votre âge" min="18" max="70" required>
        </div>
        <div class="form-group">
            <label for="taille" class="form-label mt-4"></label>
            <div class="form-group">
                <div class="input-group mb-3">
                    <span class="input-group-text">Taille (1,26m à 3m)</span>
                    <input type="number" step="0.01" min="1.26" max="3" name="taille_user" class="form-control" placeholder="Renseignez votre taille" pattern="['/^[0-9]+([.,][0-9]+)?$/']" required>
                    <span class="input-group-text">m</span>
                </div>
            </div>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="genre_user" id="optionsRadios1" value="Femme" required>
                    <label class="form-check-label" for="optionsRadios1">
                        Femme
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="genre_user" id="optionsRadios2" value="Homme" required>
                    <label class="form-check-label" for="optionsRadios2">
                        Homme
                    </label>
                </div>
            </div>

    </fieldset>


    <fieldset class="col-md-4 ml-5">
        <legend class="mt-4">Connaissances</legend>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="HTML" id="flexCheckDefault1" name="HTML">
            <label class="form-check-label" for="flexCheckDefault1">
                HTML
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="CSS" id="flexCheckChecked2" name="CSS">
            <label class="form-check-label" for="flexCheckChecked2">
                CSS
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="JavaScript" id="flexCheckDefault3" name="JavaScript">
            <label class="form-check-label" for="flexCheckDefault3">
                JavaScript
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="PHP" id="flexCheckDefault4" name="PHP">
            <label class="form-check-label" for="flexCheckDefault4">
                PHP
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="MySQL" id="flexCheckDefault5" name="MYSQL">
            <label class="form-check-label" for="flexCheckDefault5">
                MYSQL
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Boostrap" id="flexCheckDefault6" name="Bootstrap">
            <label class="form-check-label" for="flexCheckDefault6">
                Bootstrap
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Symfony" id="flexCheckDefault7" name="Symfony">
            <label class="form-check-label" for="flexCheckDefault7">
                Symfony
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="React" id="flexCheckDefault8" name="React">
            <label class="form-check-label" for="flexCheckDefault8">
                React
            </label>
        </div>

        <div class="col-md-6">
            <label for="exampleColorInput" class="form-label">Couleur préférée</label>
            <input type="color" class="form-control form-control-color" id="exampleColorInput" value="#00000" name="couleur_user">

            <label for="date" class="form-label"></label>
            <input type="date" name="date_user" class="form-control" id="date">
        </div>


    </fieldset>

    <div class="form-group col-11 mx-auto">
        <label for="formFile" class="form-label mt-4">Joindre une image (jpg ou png)</label>
        <input class="form-control" type="file" id="img" name="img">
    </div>
    <div class="d-flex justify-content-end col-md-7 mt-3">
        <button type="submit" class="btn btn-primary" name="form2">Enregistrer les données</button>
    </div>



</form>
<!-- </div> -->