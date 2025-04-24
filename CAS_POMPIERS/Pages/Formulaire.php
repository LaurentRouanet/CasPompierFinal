
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

                    <?php
                    // Connexion à la base de données 
                      try {
                        $pdo = new PDO("mysql:host=localhost;dbname=DSC", "root", "");
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        } catch (PDOException $e) 
                        {
                          die("Erreur de connexion : " . $e->getMessage());
                        }

                    // Requête pour récupérer les casernes
                    $query = "SELECT id, Nom FROM caserne";  
                      $stmt = $pdo->prepare($query);
                      $stmt->execute();
                      $casernes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>

                    <div class="form-group col-md-6">
                      <label for="caserne">Caserne :</label>
                      <select class="form-control is-invalid" id="caserne" name="caserne" required>
                      <option value="" disabled selected>Choisir une caserne</option>
                    <?php
                      
                        foreach ($casernes as $caserne) {
                        echo '<option value="' . htmlspecialchars($caserne['id']) . '">' . htmlspecialchars($caserne['Nom']) . '</option>';
                      }
                      ?>
                      </select>
                      </div>


                      <?php
                      // Connexion à la base de donnée
                      try {
                        $pdo = new PDO("mysql:host=localhost;dbname=DSC", "root", "");
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        } catch (PDOException $e) 
                        {
                          die("Erreur de connexion : " . $e->getMessage());
                        }

                    // Requête pour récupérer les grades
                    $query = "SELECT id, libellé FROM grade";  
                      $stmt = $pdo->prepare($query);
                      $stmt->execute();
                      $grades = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>

                    <div class="form-group col-md-6">
                      <label for="grade">Grade :</label>
                      <select class="form-control is-invalid" id="grade" name="grade" required>
                      <option value="" disabled selected>Sélectionner un grade</option>
                    <?php
                      // Remplissage du select avec les grades
                        foreach ($grades as $grade) {
                        echo '<option value="' . htmlspecialchars($grades['id']) . '">' . htmlspecialchars($grade['libellé']) . '</option>';
                      }
                      ?>
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