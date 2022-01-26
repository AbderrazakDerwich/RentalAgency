<?php
session_start();
?>
<header>
  <nav class="navbar navbar-expand navbar-light bg-light" aria-label="Second navbar example">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="listereservation.php">Liste de reservation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="listeVoiture.php">Liste de voiture</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="listeUser.php">Liste de user</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ajouteVoiture.php">Ajouter voiture </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../logout.php">Deconnecter</a>
          </li>
        </ul>
        <div class="Bienvenu">
          <a> Bienvenu<span> 	&#128516; </span><?= $_SESSION['name'] ?></a>
        </div>
      </div>
        <h5>KARHABTI <i class='fas fa-car-alt' style='font-size:30px;color:red'></i></h5>
    </div>
  </nav>
</header>