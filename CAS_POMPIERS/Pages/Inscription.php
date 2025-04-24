<?php
  include("../Include/Entete.inc.php");
  if (isset($_SESSION['login']) && $_SESSION['login'] == true ){
    header('Location: ../Pages/Accueil.php');}
    // Page permettant l'inscription d'un utilisateur a l'application
?> 

<div class="container custom-margin-top-3 ">
    <div>
      <?php echo generationEntete("Inscription","") ?>
      <div class="row justify-content-center entete-page">
        <p class="text-center">Merci de remplir ce formulaire d'inscription.</p>
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
    <form method="post" id="form" action="../Script/Inscription.php" novalidate>
        <div class="form-group row">
            
            <div class="form-group col-md-6">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Votre prénom" oninput="validateName('prenom')"required>
                <div class="invalid-feedback">
                    Le champ prénom est obligatoire
                </div>
            </div>
            <div class="form-group col-md-6">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" name="nom" id="nom" placeholder="Votre nom" oninput="validateName('nom')" required>
                <div class="invalid-feedback">
                    Le champ nom est obligatoire.
                </div>
            </div>
      </div>
      <div class="form-group row">
        <div class="form-group col-md-6">
          <label for="email">Adresse électronique</label>
          <input type="email" class="form-control" name="mail" id="email" placeholder="E-mail" oninput="validerEmail('email')"required>
          <small id="emailHelp" class="form-text text-muted"></small>
          <div class="invalid-feedback">
            Vous devez fournir un email valide.
          </div>
          <?php
            if (isset($_SESSION['erreurMail'])) {
                echo '<div class="alert alert-danger" role="alert">' . $_SESSION['erreurMail'] . '</div>';
                // Une fois affiché, vous pouvez supprimer le message de la session pour qu'il ne s'affiche plus après un rechargement de la page
                unset($_SESSION['erreurMail']);
            }

            ?>
        </div>
       </div>
       <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="motDePasse1">Votre mot de passe</label>
                <input type="password" class="form-control" name="motDePasse1" id="motDePasse1" oninput="vérificationMotDePasse('motDePasse1')" required>
                <div class="invalid-feedback">
                    Les mots de passe ne sont pas identiques
                </div>
            </div>
            <?php
            if (isset($_SESSION['erreurMotDePasse'])) {
                echo '<div class="alert alert-danger" role="alert">' . $_SESSION['erreurMotDePasse'] . '</div>';
                // Une fois affiché, vous pouvez supprimer le message de la session pour qu'il ne s'affiche plus après un rechargement de la page
                unset($_SESSION['erreurMotDePasse']);
            }

            ?>
      
            <div class="form-group col-md-6">
                <label for="motDePasse2">Confirmation du mot de passe</label>
                <input type="password" class="form-control" name="motDePasse2" id="motDePasse2" oninput="vérificationMotDePasse('motDePasse2')"required>
                <div class="invalid-feedback">
                    Les mots de passe ne sont pas identiques
                </div>
            </div>
        </div>

      <input type="submit" value="Valider" class="btn btn-primary" name="valider" />
    </form>
  </div>


<?php
      include ("../Include/PiedDePage.inc.php");
?>
 