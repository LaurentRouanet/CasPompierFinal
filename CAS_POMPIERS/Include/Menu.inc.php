<nav class="navbar navbar-expand-md navbar-dark fixed-top ">
    <?php $nomFichier=basename($_SERVER['SCRIPT_NAME']) ?>
        	
    <!-- Pour passer en mode hamburger si on est sur un petit écran -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" 
        data-target="#navbarCollapse" aria-controls="navbarCollapse" 
        aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
        <ul class="navbar-nav ">
            <li class="nav-item text-center  ">
                    <a class="nav-link <?php if ($nomFichier==="Accueil.php") { echo 'text-dark'; } else {echo 'text-white';}?>" data-toggle="" href="../Pages/Accueil.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                        </svg>
                        <div>Accueil</div>
                    </a>
                </li>
            <?php if (isset($_SESSION['login']) && $_SESSION['login'] == true): ?>
                <li class="nav-item text-center ml-3">
                    <a class="nav-link <?php if ($nomFichier==="MenuVehicules.php" || $nomFichier === "Vehicule.php" || $nomFichier === "AjoutVehicule.php" || $nomFichier === "Update_Engin.php" || $nomFichier === "SuppressionVehicule.php" || $nomFichier === "GestionVehicule.php" || $nomFichier === "AjoutVehiculeCaserne.php" || $nomFichier === "SuppressionVehicule.php") { echo 'text-dark'; } else {echo 'text-white';}?>" data-toggle="" href="../Pages/MenuVehicules.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
                        </svg>
                        <div>Véhicule</div>
                    </a>
                </li>
                <li class="nav-item text-center ml-3">
                    <a class="nav-link <?php if ($nomFichier==="Pompiers.php") { echo 'text-dark'; } else {echo 'text-white';}?>" href="../Pages/Pompiers.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                        </svg>
                        <div>Pompier</div> 
                    </a>
                </li>
                <!--
                <li class="nav-item text-center ml-3">
                    <a class="nav-link <?php if ($nomFichier==="agenda.php") { echo 'text-dark'; } else {echo 'text-white';}?>" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-calendar-date" viewBox="0 0 16 16">
                            <path d="M6.445 11.688V6.354h-.633A13 13 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23"/>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                        </svg>
                        <div>Agenda</div> 
                    </a>
                </li>
            -->
                <li class="nav-item text-center ml-3">
                    <a class="nav-link <?php if ($nomFichier==="Formulaire.php") { echo 'text-dark'; } else {echo 'text-white';}?>" data-toggle="" href="../Pages/Formulaire.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-file-person" viewBox="0 0 16 16">
                            <path d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                            <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                        </svg>
                        <div>Formulaire</div>
                    </a>
                </li>
                
                <li class="nav-item dropdown text-center ml-3 ">
                    <a class="nav-link text-white" data-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                        <div>Compte</div>
                    </a>
                    <div class="dropdown-menu">
                <form action="../Script/Deconnexion.php" method="post">
                    <button type="submit" class="dropdown-item font-weight-bold" name="deconnexion">
                        Déconnexion
                    </button>
                </form>
                    </div>
                </li>
           
            <?php else: ?>
                <li class="nav-item text-center ml-3">
                    <a class="nav-link <?php if ($nomFichier==="Inscription.php") { echo 'text-dark'; } else {echo 'text-white';}?>" href="../Pages/Inscription.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                            <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                        </svg>
                        <div>Inscription</div> 
                    </a>
                </li>
                <li class="nav-item text-center ml-3">
                    <a class="nav-link <?php if ($nomFichier==="Connexion.php") { echo 'text-dark'; } else {echo 'text-white';}?>" href="../Pages/Connexion.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                        </svg>
                    <div>Connexion</div> 
                    </a>
                </li>
            <?php endif; ?>
            <?php if (isset($_SESSION['login'], $_SESSION['TypeUtilisateur']) && $_SESSION['login'] === true && $_SESSION['TypeUtilisateur'] === "admin"): ?>
                <li class="nav-item text-center ml-3">
                    <a class="nav-link  <?php if ($nomFichier==="Admin.php") { echo 'text-dark'; } else {echo 'text-white';}?> " href="../Pages/Admin.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-android2" viewBox="0 0 16 16">
                            <path d="m10.213 1.471.691-1.26q.069-.124-.048-.192-.128-.057-.195.058l-.7 1.27A4.8 4.8 0 0 0 8.005.941q-1.032 0-1.956.404l-.7-1.27Q5.281-.037 5.154.02q-.117.069-.049.193l.691 1.259a4.25 4.25 0 0 0-1.673 1.476A3.7 3.7 0 0 0 3.5 5.02h9q0-1.125-.623-2.072a4.27 4.27 0 0 0-1.664-1.476ZM6.22 3.303a.37.37 0 0 1-.267.11.35.35 0 0 1-.263-.11.37.37 0 0 1-.107-.264.37.37 0 0 1 .107-.265.35.35 0 0 1 .263-.11q.155 0 .267.11a.36.36 0 0 1 .112.265.36.36 0 0 1-.112.264m4.101 0a.35.35 0 0 1-.262.11.37.37 0 0 1-.268-.11.36.36 0 0 1-.112-.264q0-.154.112-.265a.37.37 0 0 1 .268-.11q.155 0 .262.11a.37.37 0 0 1 .107.265q0 .153-.107.264M3.5 11.77q0 .441.311.75.311.306.76.307h.758l.01 2.182q0 .414.292.703a.96.96 0 0 0 .7.288.97.97 0 0 0 .71-.288.95.95 0 0 0 .292-.703v-2.182h1.343v2.182q0 .414.292.703a.97.97 0 0 0 .71.288.97.97 0 0 0 .71-.288.95.95 0 0 0 .292-.703v-2.182h.76q.436 0 .749-.308.31-.307.311-.75V5.365h-9zm10.495-6.587a.98.98 0 0 0-.702.278.9.9 0 0 0-.293.685v4.063q0 .406.293.69a.97.97 0 0 0 .702.284q.42 0 .712-.284a.92.92 0 0 0 .293-.69V6.146a.9.9 0 0 0-.293-.685 1 1 0 0 0-.712-.278m-12.702.283a1 1 0 0 1 .712-.283q.41 0 .702.283a.9.9 0 0 1 .293.68v4.063a.93.93 0 0 1-.288.69.97.97 0 0 1-.707.284 1 1 0 0 1-.712-.284.92.92 0 0 1-.293-.69V6.146q0-.396.293-.68"/>
                        </svg>
                        <div>Admin</div> 
                    </a>
                </li>
            <?php endif; ?>
        </ul>

    </div>
    
</nav>