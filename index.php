<?php
/*
  Projet: M306 - Annonces
  Description: Page de connexion
  Auteur: Jacot-dit-Montandon Ludovic, Villafuerte Bryan, Burnand Loic
  Version: 1.0
  Date: 2018-19
 */
require_once 'bdd.php';

$arrTypes = getTypes();
$arrAnnonce = getAnnoncesByType($_GET["types"]);
$type = getTypesById($_GET["types"]);

if (isset($_POST["email"])) {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
}
if (isset($_POST["password"])) {
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
}
if (!empty($email) && !empty($password)) {
    userExist($email, $password);
    session_start();
    $_SESSION["email"] = $email;
    $idUser = getUserId($email);
    $_SESSION["idUser"] = $idUser[0];
    $_SESSION["login"] = true;
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="generator" content="Jekyll v3.8.5">
        <title>M306 - Annonces</title>

        <!-- Insert CSS -->
        <link href="bootstrap-4.2.1-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>

        <!-- Custom styles for this template -->
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="blog.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <header class="blog-header py-3">
                <div class="row flex-nowrap justify-content-between align-items-center">
                    <div class="col-4 pt-1">
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#postModal">Ajouter</button>
                    </div>
                    <div class="col-4 text-center">
                        <a class="blog-header-logo text-dark" href="#">M306</a>
                    </div>
                    <div class="col-4 d-flex justify-content-end align-items-center">
                        <?php if (!isset($_SESSION["login"])) { ?>
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#loginModal">Connexion</button>
                        <?php } else { ?>
                            <button type="button" class="btn btn-sm btn-outline-secondary"><a href="logout.php">Deconnexion</a></button>
                        <?php } ?>
                    </div>
                </div>
            </header>

            <?php include 'navigation.php'; ?>

            <!-- Modal Login -->
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="#" method="POST">
                                <div class="form-group">
                                    <label for="email" class="col-form-label">Email:</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-form-label">Mot de passe:</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Se connecter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--modal-->
            <script>
                $(document).ready(function () {
                    $("#loginModal").modal();
                });
            </script>

            <!-- Modal Post-->
            <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter une annonce</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="ajouterAnnonce.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="title" class="col-form-label">Titre:</label>
                                    <input type="text" class="form-control" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-form-label">Description:</label>
                                    <textarea type="text" class="form-control" name="description" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="price" class="col-form-label">Prix:</label>
                                    <input type="number" class="form-control" name="price">
                                </div>
                                <div class="form-group">
                                    <label for="photo" class="col-form-label">Photo:</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <div class="form-group">
                                    <label for="type" class="col-form-label">Catégorie:</label>
                                    <select name="type" class="form-control">
                                        <?php
                                        foreach ($arrTypes as $types) {
                                            echo '<option class="form-control" value="' . $types["IdType"] . '">' . $types["Name"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--modal-->
            <script>
                $(document).ready(function () {
                    $("#postModal").modal();
                });
            </script>

            <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
                <div class="col-md-6 px-0">
                    <h1 class="display-4 font-italic"><?php echo $type[0]["Name"]; ?></h1>
                    <p class="lead my-3"><?php echo $type[0]["description"]; ?></p>
                </div>
            </div>
            <div class="row mb-2">
                <?php
                foreach ($arrAnnonce as $annonces) {
                    ?>
                    <div class="col-md-6">
                        <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-primary"><?php echo $type[0]["Name"]; ?></strong>
                                <h3 class="mb-0">
                                    <a class="text-dark" href="#"><?php echo $annonces["Name"]; ?></a>
                                </h3>
                                <div class="mb-1 text-muted">Prix : <?php echo $annonces["Prix"]; ?>.- frs</div>
                                <p class="card-text mb-auto"><?php echo $annonces["Description"]; ?></p>
                            </div>
                            <img width="200" height="200" class="img img-responsive" src="upload/<?php echo $annonces['nomImage']; ?>">
                        </div>
                    </div> 
                    <?php
                }
                ?>
            </div>
        </div>
        <footer class="blog-footer text-center">
            <hr>
            <p>2018-2019 CFPT-informatique M306</p>
            <p>Jacot-dit-Montandon, Villafuerte, Burnand</p>
            <p>
                <a href="#">Retour en haut</a>
            </p>
        </footer>

        <!-- JS code -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js">
        </script>
        <script src="bootstrap-4.2.1-dist/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>