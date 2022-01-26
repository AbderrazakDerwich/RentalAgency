<nav class="navbar navbar-expand navbar-light bg-light" aria-label="Second navbar example">
    <div class="container-fluid">  
        <div class="collapse navbar-collapse" id="navbarsExample02">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                  <a class="nav-link" href="index.php">Liste de categorie de voiture</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="rent.php">Lise de  voiture </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Deconnecter</a>
                </li>
            </ul>
            <span class="navbar-text" style="color:brown;">
                <span style="font-size: 15px; float: left; vertical-align: top;font-style: italic;color:lavenderblush;" > 
                    bienvenue monsieur 
                    <span style="color:lightsalmon;"><?= $item->getFirstName()." ".$item->getLastName() ?></span> 
                    dans votre espace client 
                </span>
            </span>
        </div>
    </div>
</nav>