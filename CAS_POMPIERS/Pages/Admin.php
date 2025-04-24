<?php
include("../Include/Entete.inc.php");
?>
<?php
if (isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['TypeUtilisateur'] == "admin") {
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Journal d'activité</h1>
        <form class="form-inline mb-3">
            <input class="form-control mr-sm-2" type="search" placeholder="Rechercher..." aria-label="Search" id="searchInput" oninput="filterTable()">

        </form>
        <div class="table-responsive scrollable-table">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date et heure</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody id="journalBody">
                    <?php
                    $log_file = '../log/Journal.log';
                    $log_content = file_get_contents($log_file);

                    if ($log_content === false) {
                        echo "<tr><td colspan='2'>Erreur : Impossible de lire le fichier journal.</td></tr>";
                    } else {
                        // Diviser le contenu du journal en lignes et les afficher dans la table
                        $lines = explode("\n", $log_content);
                        foreach ($lines as $line) {
                            $parts = explode("]", $line, 2);
                            $date_time = trim($parts[0], "[]");
                            $message = isset($parts[1]) ? trim($parts[1]) : '';
                            echo "<tr><td>$date_time</td><td>$message</td></tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
                 
        <h2>Ajout caserne</h2>
            <form method="post" id="formulaire" action="../script/ajoutCaserne.php">
            <div class="form-group row">
                <div class="form-group col-md-6">
                    <label for="id">Id Caserne</label>
                    <input type="number" class="form-control" name="id" id="id" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="nom">Nom caserne</label>
                    <input type="text" class="form-control" name="nom" id="nom" required>
                </div>
                <div class="form-group col-md-12 text-center">
                    <input type="submit" value="Valider" class="btn btn-primary" name="valider" id="boutton" />  
                </div>
            </div>
            </form>
            <?php
                if (isset($_SESSION['error_message'])) {
                    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_message'] . '</div>';
                    // Une fois affiché, vous pouvez supprimer le message de la session pour qu'il ne s'affiche plus après un rechargement de la page
                    unset($_SESSION['error_message']);
                }
                if (isset($_SESSION['success_message'])) {
                    echo '<div class="alert alert-success" role="alert">' . $_SESSION['success_message'] . '</div>';
                    // Une fois affiché, vous pouvez supprimer le message de la session pour qu'il ne s'affiche plus après un rechargement de la page
                    unset($_SESSION['success_message']);
                }
            ?>
        <h2>Suppression caserne</h2>
            <form method="post" id="formulaire" action="../Script/SuppressionCaserne.php">
                <div class="form-group row">
                    
                    <label for="inputState">Caserne</label>
                    <select id="Caserne" class="form-control " name="Caserne" oninput="validateCaserne()" required>
                        <option value="" disabled selected>Choisissez une caserne</option>
                        <?php
                        $listeCaserne = $caserneManager->getCaserne();

                        // Générer le menu HTML
                        foreach ($listeCaserne as $caserne) {
                            echo '<option value="' . $caserne['id'] . '">' . $caserne['Nom'] . '</option>';
                        }
                        ?>
                    </select>
                    <div class="form-group col-md-12 custom-margin-top-1 text-center">
                        <input type="submit" value="Valider" class="btn btn-primary" name="valider" id="boutton" />  
                    </div>
                </div>
            </form>
            <?php
                if (isset($_SESSION['error_caserne'])) {
                    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_caserne'] . '</div>';
                    unset($_SESSION['error_caserne']);
                }
                if (isset($_SESSION['success_Caserne'])) {
                    echo '<div class="alert alert-success" role="alert">' . $_SESSION['success_Caserne'] . '</div>';
                    unset($_SESSION['success_Caserne']);
                }
            ?>
    </div>


    <?php
} else {
    header('Location: ../Pages/Accueil.php');
}
?>
<?php
      include ("../Include/PiedDePage.inc.php");
?>