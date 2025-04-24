<?php
include("../Include/Entete.inc.php");

if (isset($_SESSION['login']) && $_SESSION['login'] == false ){
    header('Location: ../Pages/Connexion.php');}
?>


<div class="container custom-margin-top-3 ">
    <div class=" entete-page-color">
      <?php echo generationEntete("Suppression d'un type Engin","") ?>
      
      <div class="row justify-content-center entete-page">
        <p class="text-center">Attention la suppression est définitive !!!</p>
      </div>
    </div>
    

    <?php
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $vehicule =  $typeEnginManager->affichageTypeEnginId($id);
    }else{
        header("Location: ../Pages/Vehicule.php");
        exit();
    }      
     
    ?>
    
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-4 mx-auto">
                <div class="card-deck">
                    <div class="card bg-light border-dark">
                        <img class="card-img-top" src="<?php echo $vehicule['Url_Image']; ?>" alt="Photo"/>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $vehicule['Libellé']; ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    

</div>
    <div class="text-center custom-margin-top-1">
    <form action="../Script/SuppressionVehicule.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" class="btn btn-danger">Suppression véhicule</button>
    </form>
    </div>
<?php
    include ("../Include/PiedDePage.inc.php");
?>
