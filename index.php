<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.5">
        <title>M306 - Annonces</title>

        <!-- Bootstrap core CSS -->
        <link href="bootstrap-4.2.1-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
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
                        <a class="text-muted" href="#">Subscribe</a>
                    </div>
                    <div class="col-4 text-center">
                        <a class="blog-header-logo text-dark" href="#">M306</a>
                    </div>

                    <div class="col-4 d-flex justify-content-end align-items-center">
                        <a class="text-muted" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3" focusable="false" role="img"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
                        </a>
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#loginModal" data-whatever="@mdo">Connexion</button>
                    </div>
                </div>
            </header>

            <?php include 'navigation.php'; ?>

            <!-- Modal -->
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
                            <form>
                                <div class="form-group">
                                    <label for="email" class="col-form-label">Email:</label>
                                    <input type="email" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-form-label">Mot de passe:</label>
                                    <input type="password" class="form-control" id="recipient-name">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="button" class="btn btn-primary">Se connecter</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- JS code -->
            <script src="https://code.jquery.com/jquery-3.1.1.min.js">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
            </script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js">
            </script>
            <!--modal-->
            <script>
                $(document).ready(function () {
                    $("#loginModal").modal();
                });
            </script>

            <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
                <div class="col-md-6 px-0">
                    <h1 class="display-4 font-italic">Nom de la catégorie</h1>
                    <p class="lead my-3">Brève description de la catégorie en question</p>
                    <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">La couleure de fond varie pour chaque catégorie</a></p>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-primary">World</strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="#">Featured post</a>
                            </h3>
                            <div class="mb-1 text-muted">Nov 12</div>
                            <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                            <a href="#">Continue reading</a>
                        </div>
                        <svg class="bd-placeholder-img card-img-right flex-auto d-none d-lg-block" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect fill="#55595c" width="100%" height="100%"></rect><text fill="#eceeef" dy=".3em" x="50%" y="50%">Thumbnail</text></svg>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-success">Design</strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="#">Post title</a>
                            </h3>
                            <div class="mb-1 text-muted">Nov 11</div>
                            <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                            <a href="#">Continue reading</a>
                        </div>
                        <svg class="bd-placeholder-img card-img-right flex-auto d-none d-lg-block" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect fill="#55595c" width="100%" height="100%"></rect><text fill="#eceeef" dy=".3em" x="50%" y="50%">Thumbnail</text></svg>
                    </div>
                </div>
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
        <script src="bootstrap-4.2.1-dist/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>