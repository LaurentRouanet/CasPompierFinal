<?php
  include("../Include/Entete.inc.php");
  if (isset($_SESSION['login']) && $_SESSION['login'] == true ){
    header('Location: ../Pages/Accueil.php');}

    // Page de connexion d'un utilisateur a l'application.
?>

<div class="container custom-margin-top-3 ">
    <div>
      <?php echo generationEntete("Connexion","") ?>
      <div class="row justify-content-center entete-page">
        <p class="text-center">Merci de remplir les champs de connexion.</p>
      </div>
      <?php
                if (isset($_SESSION['erreur_formulaire'])) {
                    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['erreur_formulaire'] . '</div>';
                    // Une fois affiché, vous pouvez supprimer le message de la session pour qu'il ne s'affiche plus après un rechargement de la page
                    unset($_SESSION['erreur_formulaire']);
                }
                if (isset($_SESSION['success_message'])) {
                    echo '<div class="alert alert-success" role="alert">' . $_SESSION['success_message'] . '</div>';
                    // Une fois affiché, vous pouvez supprimer le message de la session pour qu'il ne s'affiche plus après un rechargement de la page
                    unset($_SESSION['success_message']);
                }
               
            ?>

    </div>
    
    <div class="jumbotron">
    <form method="post" id="form" action="../Script/ConnexionSession.php" novalidate>
        
      <div class="form-group ">
        <div class="form-group col-md-6">
          <label for="email">Adresse électronique</label>
          <input type="email" class="form-control" name="mail" id="email" placeholder="E-mail" oninput="validerEmail('email')"required>
          <small id="emailHelp" class="form-text text-muted"></small>
          <div class="invalid-feedback">
            Vous devez fournir un email valide.
          </div>
            <?php
                if (isset($_SESSION['erreur_mail'])) {
                        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['erreur_mail'] . '</div>';
                        // Une fois affiché, vous pouvez supprimer le message de la session pour qu'il ne s'affiche plus après un rechargement de la page
                        unset($_SESSION['erreur_mail']);
                    }
            ?>
        </div>
       </div>
       <div class="form-group ">
            <div class="form-group col-md-6">
                <label for="motDePasse1">Votre mot de passe</label>
                <input type="password" class="form-control" name="motDePasse1" id="motDePasse1" oninput="vérificationMotDePasse('motDePasse1')" required>
            
                <?php
                    if (isset($_SESSION['erreur_mdp'])) {
                            echo '<div class="alert alert-danger" role="alert">' . $_SESSION['erreur_mdp'] . '</div>';
                            // Une fois affiché, vous pouvez supprimer le message de la session pour qu'il ne s'affiche plus après un rechargement de la page
                            unset($_SESSION['erreur_mdp']);
                        }
                ?>
            </div>
        </div>
           

      <input type="submit" value="Valider" class="btn btn-primary" name="valider" />
    </form>
  </div>





<?php
  include ("../Include/PiedDePage.inc.php");
?>