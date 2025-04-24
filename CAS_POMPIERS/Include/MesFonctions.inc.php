<?php

function generationEntete(string $titre): string
{
  // Voir pour le traitement si besoins des chaines
  return '<div class="py-5 text-center">
                <h1 class="display-5">'.$titre.'</h1>
          </div>';
}


/**
 * Génère le code HTML avec Bootstrap pour les options dans une page
 *
 * @param  string Titre de l'option
 * @param  string texte qui figure en dessous de l'image
 * @param  string Url de l'image (ex : images/imagesCarte/gestionEngin.jpeg )
 * @param  string Url où va pointer le bouton
 * @param  string Titre du bouton (falcultatif) Go si pas renseigné 
 * @return string Retourne le code HTML 
 */
function generationOptions(string $titre,  string $libelle,string $url_image="SDIS.jpeg", string $lien='#', string $titre_boutons="Valider"): string
{
  return '
  <div class="col col-espace">
        <div class="card" style="width: 18rem;">
          <img src="../Images/Gestion_vehicules/'. $url_image. '" class="card-img-top card-img-taille" alt="'.$libelle.'">
          <div class="card-body">
            <h5 class="card-title">'. $titre .'</h5>
            <p class="card-text">'. $libelle .'</p>
            <a href="'. $lien. '" class="w-100 btn btn-lg btn-outline-primary">'. $titre_boutons. '</a>
          </div>
        </div>
  </div>';
}