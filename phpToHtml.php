<?php

/*
  Projet: M306 - Annonces
  Description: Page d'include
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */

function formLogin() {
    echo '
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
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-form-label">Mot de passe:</label>
                                    <input type="password" class="form-control" id="mdp">
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
            </script>';
}
