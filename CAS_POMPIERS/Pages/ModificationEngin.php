<?php
include("../Include/Entete.inc.php");

if (isset($_SESSION['login']) && $_SESSION['login'] == false ){
    header('Location: ../Pages/Connexion.php');}
?>


<div class="container custom-margin-top-3 ">
    <div class=" entete-page-color">
      <?php echo generationEntete("Modification d'un type Engin","") ?>
      
      <div class="row justify-content-center entete-page">
        <p class="text-center">Modifier les champs qui vous semble utile !</p>
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
                        <img id="apercuImage" class="card-img-top" src="<?php echo $vehicule['Url_Image']; ?>" alt="Photo" />
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $vehicule['Libellé']; ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
                <form id="myForm" action="../Script/Update_Engin.php" method="post" enctype="multipart/form-data" novalidate>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group ">
                        <div class="form-group">
                            <label for="idTypeEngin">Identifiant non modifiable</label>
                            <input type="text" class="champCaserne form-control" name="idTypeEngin" id="idTypeEngin" placeholder=<?php echo $id; ?> disabled>
                            <div class="invalid-feedback">
                                Le champ idTypeEngin est obligatoire
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="form-group ">
                            <label for="photo">Photo</label>
                            <input type="file" name="photo" id="photo" accept="image/*" class="photo bordure-none form-control" onchange="afficherImage()" required>
                            <div class="invalid-feedback">
                                Veuillez sélectionner une image.
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group ">
                            <label for="libelleEngin">Libellé de l'engin</label>
                            <input type="text" class="champLibelleEngin form-control" name="libelleEngin" id="libelleEngin" required>
                            <div class="invalid-feedback">
                                Le champ Libellé de l'engin est obligatoire
                            </div>
                        </div>
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
           
    </div>



</div>
    
<?php
    include ("../Include/PiedDePage.inc.php");
?>
