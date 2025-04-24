<?php
include("../Include/Entete.inc.php");

if (isset($_SESSION['login']) && $_SESSION['login'] == false ){
    header('Location: ../Pages/Connexion.php');
    exit; // Assurez-vous de terminer le script après une redirection
}
?>

<div class="container custom-margin-top-3 ">
    <div class=" entete-page-color">
      <?php echo generationEntete("Suppression d'un véhicule d'une caserne 🚒","") ?>
      
      <div class="row justify-content-center entete-page">
        <p class="text-center">Attention la suppression est définitive !!!</p>
      </div>
    </div>
    
    <form action="../Script/SuppressionAffectation.php" method="post">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group text-center custom-margin-top-1">
                        <label for="inputState">Véhicule</label>
                        <select id="vehicule" class="form-control" name="vehicule" onchange="selectionAffectation()" required>
                            <option value="" disabled selected>Choisissez une affectation</option>
                            <?php
                            $listeAffectation = $enginManager->affichageEngin();

                            // Générer le menu HTML
                            foreach ($listeAffectation as $affectation) {
                                echo '<option value="' . $affectation['Numéro'] .'|' . $affectation['Type_Engin_id'] . '|' . $affectation['Caserne_id'] . '">' . "Véhicule de type: ". $affectation['Type_Engin_id'] ." ,Immatriculer: ". $affectation['Numéro']." ,Caserne: ". $caserneManager->getCaserneId($affectation['Caserne_id']). '</option>';
                            }
                            ?>
                        </select>
                    </div>
                        <input type="hidden" id="numero" name="numero">
                        <input type="hidden" id="typeEnginId" name="typeEnginId">
                        <input type="hidden" id="caserneId" name="caserneId">
                </div>
            </div>
        </div>
        
        <div class="text-center custom-margin-top-1">
            <button type="submit" class="btn btn-danger">Suppression véhicule</button>
        </div>
    </form>
    <?php
    if (isset($_SESSION['success_message'])) {
        echo '<div class="alert alert-success" role="alert">' . $_SESSION['success_message'] . '</div>';
        // Une fois affiché, vous pouvez supprimer le message de la session pour qu'il ne s'affiche plus après un rechargement de la page
        unset($_SESSION['success_message']);
    }?>
    
</div>

<?php
    include ("../Include/PiedDePage.inc.php");
?>