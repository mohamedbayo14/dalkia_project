<nav
     id="menu" class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
    <!-- Le container permet d'aligner les éléments de la barre de navigation sur les autre conteneurs -->
    <div class="container">
        <!-- appel de l'icone Dalkia -->
        
        <a class="navbar-brand" href="#"><img id="IdDalkia" src="https://upload.wikimedia.org/wikipedia/fr/thumb/3/3c/Logo-dalkia-groupe-edf.jpg/170px-Logo-dalkia-groupe-edf.jpg" alt="Dalkia"></a>
        <!-- Bouton apparaissant pour les petits écrans, à cliquer pour faire apparaitre le menu -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#elementsMenu" aria-controls="elementsMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Des élements du menu -->
        <div class="collap
            se navbar-collapse" id="elementsMenu">
            <ul class="navbar-nav mr-auto">
                 <li class="nav-item active">
                <a class="nav-link" href="page_information_inscrit.php">Information des inscrits </a>
                </li>
                 <li class="nav-item active">
                <a class="nav-link" href="page_droit_acces.php">Droit d'accès </a>
                </li>  
                <li class="nav-item active">
                <a class="nav-link" href="supprimer.php">Retrait droit d'accès </a>
                </li>           
                 <li class="nav-item active">
                <a class="nav-link" href="deconnexion.php"> Deconnexion </a>
                </li>
                <!-- commentaire -->
            </ul>
        </div>
    </div>
</nav>