<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire PHP Bootstrap</title>
    <center><h1> Ajout pompier 🧯 </h1></center>
    <!-- Inclure Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8"> <!-- Colonne principale plus large -->
            <form action="traitement.php" method="post">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="matricule">Matricule :</label>
                        <input type="text" class="form-control is-invalid" id="matricule" name="matricule" placeholder="Ex: 876524" maxlength="8" required>
                        <div class="invalid-feedback">
                            Champ invalide! Veuillez entrer un matricule valide.
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="datenaissance">Date de naissance :</label>
                        <input type="date" class="form-control is-invalid" id="datenaissance" name="datenaissance" required>
                        <div class="invalid-feedback">
                            Champ invalide! Veuillez entrer une date de naissance.
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nom">Nom  :</label>
                        <input type="text" class="form-control is-invalide" id="nom" name="nom" maxlength="15" required>
                        <div class="invalid-feedback">
                            Champ invalide! Veuillez entrer un nom.
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="prenom">Prénom :</label>
                        <input type="text" class="form-control is-invalid" id="prenom" name="prenom" maxlength="15" required>
                        <div class="invalid-feedback">
                            Champ invalide! Veuillez entrer un prénom.
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Sexe :</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexe" id="feminin" value="feminin" required>
                            <label class="form-check-label" for="feminin">
                                Féminin
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexe" id="masculin" value="masculin" required>
                            <label class="form-check-label" for="masculin">
                                Masculin
                            </label>
                        </div>
                        <div class="invalid-feedback">
                            Veuillez sélectionner le sexe.
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="grade">Grade :</label>
                        <select class="form-control is-invalid" id="grade" name="grade" required>
                            <option value="" disabled selected>Choisir un grade</option>
                            <option value="Auxiliaire">Auxiliaire</option>
                            <option value="Sapeur 2ème classe">Sapeur 2ème classe</option>
                            <option value="Sapeur 1ère classe">Sapeur 1ère classe</option>
                            <option value="Caporal">Caporal</option>
                            <option value="Caporal-chef">Caporal-chef</option>
                            <option value="Sergent">Sergent</option>
                            <option value="Sergent-chef">Sergent-chef</option>
                            <option value="Adjudant">Adjudant</option>
                            <option value="Adjudant-chef">Adjudant-chef</option>
                            <option value="Lieutenant">Lieutenant</option>
                            <option value="Capitaine">Capitaine</option>
                            <option value="Commandant">Commandant</option>
                            <option value="Lieutenant-colonel">Lieutenant-colonel</option>

                        </select>
                        <div class="invalid-feedback">
                            Champ invalide! Veuillez choisir un grade.
                        </div>
                    </div>
                </div> 

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="telephone">Téléphone :</label>
                        <input type="tel" class="form-control is-invalid" id="telephone" name="telephone" placeholder="Ex: 123-456-7890" maxlength="14" required>
                        <div class="invalid-feedback">
                            Champ invalide! Veuillez entrer un numéro de téléphone valide.
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="caserne">Caserne :</label>
                        <select class="form-control is-invalid" id="caserne" name="caserne" required>
                            <option value="" disabled selected>Choisir une caserne</option>
                            <option value="Oussant">Oussant</option>
                            <option value="Carcassonne">Carcassonne</option>
                            <option value="Lille">Lille</option>
                        </select>
                        <div class="invalid-feedback">
                            Champ invalide! Veuillez choisir une caserne.
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Type pompier :</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type pompier" id="Professionnel" value="Professionnel" required>
                            <label class="form-check-label" for="Professionnel">
                                Professionnel
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type pompier" id="Volontaire" value="Volontaire" required>
                                Volontaire
                            </label>
                        </div>
                        <div class="invalid-feedback">
                                Veuillez sélectionner le type de pompier.
                            </div>
                        </div>

                <button type="submit" class="btn btn-primary">Ajout du pompier</button>

            </form>
        </div>
    </div>
</div>

<!-- Inclure Bootstrap JS (facultatif, mais nécessaire pour certaines fonctionnalités) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    // Ajouter des écouteurs d'événements pour détecter les changements dans les champs et mettre à jour les classes
    document.addEventListener('DOMContentLoaded', function () {
        var formFields = document.querySelectorAll('.form-control');

        formFields.forEach(function (field) {
            field.addEventListener('input', function () {
                if (field.checkValidity()) {
                    field.classList.remove('is-invalid');
                    field.classList.add('is-valid');
                } else {
                    field.classList.remove('is-valid');
                    field.classList.add('is-invalid');
                }
            });
        });
    });
</script>

</body>
</html>