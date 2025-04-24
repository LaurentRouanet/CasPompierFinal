<?php
include("../Include/Entete.inc.php");
if (isset($_SESSION['login']) && $_SESSION['login'] == false ){
    header('Location: ../Pages/Connexion.php');}
?>

<div class="container custom-margin-top-3">
    <div class=" entete-page-color">
        <?php echo generationEntete("Ajout d'un type d'engin","") ?>
        
        <div class="row justify-content-center entete-page">
            <p class="text-center">Formulaire pour ajouter un type d'engin</p>
        </div>
    </div>
    <h2 class="custom-margin-top-1">Ajout d'un type d'engin</h2>

    <div class="row ">
      <div class="col-md-6">
        <form id="myForm" action="../Script/UploadEngin.php" method="post" enctype="multipart/form-data" novalidate>
            <div class="form-group ">
                <div class="form-group">
                    <label for="idTypeEngin">idTypeEngin</label>
                    <input type="text" class="champCaserne form-control" name="idTypeEngin" id="idTypeEngin" placeholder="Ex: EPA" required>
                    <div class="invalid-feedback">
                        Le champ idTypeEngin est obligatoire
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="form-group ">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" id="photo" accept="image/png, image/jpeg, image/jpg" class="photo bordure-none form-control" oninput="afficherImageEnTempsReel()" required>
                    <div class="invalid-feedback">
                        Veuillez sélectionner une image.
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group ">
                    <label for="libelleEngin">Libellé de l'engin</label>
                    <input type="text" class="champLibelleEngin form-control" name="libelleEngin" id="libelleEngin"  required>
                    <div class="invalid-feedback">
                        Le champ Libellé de l'engin est obligatoire
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
      </div>
      <!-- Affichage de l'image -->
      <div class="col-md-6">
          <div class="image-container-wrapper">
              <div id="imageContainer"></div>
          </div>
      </div>

    </div>
    <?php
        if (isset($_SESSION['success_message'])) {
            echo '<p class="success-message">' . $_SESSION['success_message'] . '</p>';

            // Effacer le message de succès après l'avoir affiché
            unset($_SESSION['success_message']);
        }
        if (isset($_SESSION['error_message'])) {
            echo '<p class="alert alert-danger">' . $_SESSION['error_message'] . '</p>';

            // Effacer le message de succès après l'avoir affiché
            unset($_SESSION['error_message']);
        }
        ?>

</div>

<?php
    include ("../Include/PiedDePage.inc.php");
?>