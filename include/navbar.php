<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="tableau_bord.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <!-- Gestion Étudiants -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#etudiants-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person-lines-fill"></i><span>Gestion Étudiants</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="etudiants-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li><a href="ajouter_etudiant.php"><i class="bi bi-circle"></i><span>Ajouter Étudiant</span></a></li>
        <li><a href="liste_etudiants.php"><i class="bi bi-circle"></i><span>Liste des Étudiants</span></a></li>
      </ul>
    </li>

    <!-- Gestion Enseignants -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#enseignants-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person-video3"></i><span>Gestion Enseignants</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="enseignants-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li><a href="ajouter_enseignant.php"><i class="bi bi-circle"></i><span>Ajouter Enseignant</span></a></li>
      </ul>
    </li>

    <!-- Gestion Soutenances -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#soutenances-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Soutenances</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="soutenances-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li><a href="ajouter_soutenance.php"><i class="bi bi-circle"></i><span>Ajouter Soutenance</span></a></li>
        <li><a href="liste_soutenances.php"><i class="bi bi-circle"></i><span>Liste des Soutenances</span></a></li>
        <li><a href="rechercher.php"><i class="bi bi-circle"></i><span>Recherche</span></a></li>
      </ul>
    </li>

    <!-- Authentification -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="logout.php">
        <i class="bi bi-box-arrow-right"></i>
        <span>Déconnexion</span>
      </a>
    </li>

  </ul>

</aside><!-- End Sidebar-->
