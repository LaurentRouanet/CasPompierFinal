<?php
// Activer l'affichage des erreurs pour le débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("../Include/Entete.inc.php"); // Vérifiez que le chemin est correct
?>
<div class="container custom-margin-top-3"> 
    
    <div class ="entête custom-margin-top-3">
        <?php echo generationEntete("Accueil pompier ⛑️"); // Vérifiez que la fonction est bien définie ?>
    </div>
    <div id="carouselExampleFade" class="carousel slide carousel-fade w-75 mx-auto" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100 mx-auto" src="../Images/Vehicules/Caserne.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100 mx-auto" src="../Images/Vehicules/Caserne1.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100 mx-auto" src="../Images/Vehicules/Caserne2.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    
    <div class="presentation-text text-center">
        <p>Bienvenue sur notre application dédiée à la gestion de l'agenda et des ressources des pompiers</p>
       
    </div>
</div>

<?php
include_once("../Include/PiedDePage.inc.php");
?>

