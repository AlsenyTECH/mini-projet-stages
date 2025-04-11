<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>

<header id="header" class="header fixed-top d-flex align-items-center">

  <!-- 🔹 Logo IPM -->
  <div class="d-flex align-items-center justify-content-between">
    <a href="tableau_bord.php" class="logo d-flex align-items-center">
      <img src="assets/img/ipm-logo.png" alt="Logo IPM"> <!-- Mets le logo ici -->
      <span class="d-none d-lg-block">IPM</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div>

  <!-- ❌ Suppression de la barre de recherche -->
  <!-- Barre de recherche supprimée ici -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <!-- 🔔 Notifications personnalisées -->
      <li class="nav-item dropdown">
        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-bell-fill"></i>
          <span class="badge bg-danger badge-number">2</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
          <li class="dropdown-header">
            Vous avez 2 nouvelles notifications
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li class="notification-item">
            <i class="bi bi-exclamation-circle text-warning"></i>
            <div>
              <h4>Attention</h4>
              <p>Un étudiant a modifié son dossier</p>
              <p>Il y a 10 min</p>
            </div>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li class="notification-item">
            <i class="bi bi-check-circle text-success"></i>
            <div>
              <h4>Succès</h4>
              <p>Nouvelle soutenance ajoutée</p>
              <p>Il y a 1 h</p>
            </div>
          </li>
        </ul>
      </li>

      <!-- 💬 Messages personnalisés -->
      <li class="nav-item dropdown">
        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-chat-left-text-fill"></i>
          <span class="badge bg-success badge-number">1</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
          <li class="dropdown-header">
            Vous avez 1 message
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li class="message-item">
            <a href="#">
              <img src="assets/img/profile.png" alt="" class="rounded-circle">
              <div>
                <h4>Secrétariat</h4>
                <p>Merci de valider les soutenances avant lundi</p>
                <p>Il y a 30 min</p>
              </div>
            </a>
          </li>
        </ul>
      </li>

      <!-- 👤 Profil admin dynamique -->
      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="<?= $_SESSION['photo'] ?? 'assets/img/ipm-logo.png' ?>" alt="Profile" class="rounded-circle">
          <span class="d-none d-md-block dropdown-toggle ps-2"><?= $_SESSION['admin_nom'] ?? 'Admin' ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6><?= $_SESSION['admin_nom'] ?? 'Administrateur' ?></h6>
            <span>Administrateur</span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="logout.php">
              <i class="bi bi-box-arrow-right"></i>
              <span>Déconnexion</span>
            </a>
          </li>
        </ul>
      </li>

    </ul>
  </nav>
</header>
