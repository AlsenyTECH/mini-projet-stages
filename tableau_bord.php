<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}
require_once 'include/connexion.php';

// Pour affichage rapide de stats
$nb_etudiants = $pdo->query("SELECT COUNT(*) FROM Etudiant")->fetchColumn();
$nb_enseignants = $pdo->query("SELECT COUNT(*) FROM Enseignant")->fetchColumn();
$nb_soutenances = $pdo->query("SELECT COUNT(*) FROM Soutenance")->fetchColumn();
?>

<?php include('include/head.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/navbar.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Tableau de Bord</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Accueil</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="row">

      <!-- Étudiants -->
      <div class="col-lg-4">
        <div class="card info-card students-card">
          <div class="card-body">
            <h5 class="card-title">Étudiants</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">
                <i class="bi bi-people-fill"></i>
              </div>
              <div class="ps-3">
                <h6><?= $nb_etudiants ?></h6>
                <span class="text-muted small pt-2 ps-1">Total</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Enseignants -->
      <div class="col-lg-4">
        <div class="card info-card teachers-card">
          <div class="card-body">
            <h5 class="card-title">Enseignants</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle bg-success text-white d-flex align-items-center justify-content-center">
                <i class="bi bi-person-badge-fill"></i>
              </div>
              <div class="ps-3">
                <h6><?= $nb_enseignants ?></h6>
                <span class="text-muted small pt-2 ps-1">Total</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Soutenances -->
      <div class="col-lg-4">
        <div class="card info-card soutenance-card">
          <div class="card-body">
            <h5 class="card-title">Soutenances</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle bg-warning text-white d-flex align-items-center justify-content-center">
                <i class="bi bi-journal-check"></i>
              </div>
              <div class="ps-3">
                <h6><?= $nb_soutenances ?></h6>
                <span class="text-muted small pt-2 ps-1">Total</span>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="row mt-4">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Accès rapide</h5>
            <a href="ajouter_etudiant.php" class="btn btn-outline-primary m-2">Ajouter un étudiant</a>
            <a href="ajouter_enseignant.php" class="btn btn-outline-success m-2">Ajouter un enseignant</a>
            <a href="ajouter_soutenance.php" class="btn btn-outline-warning m-2">Ajouter une soutenance</a>
            <a href="liste_etudiants.php" class="btn btn-outline-secondary m-2">Gérer les étudiants</a>
            <a href="liste_soutenances.php" class="btn btn-outline-dark m-2">Voir toutes les soutenances</a>
            <a href="rechercher.php" class="btn btn-outline-info m-2">Rechercher une soutenance</a>
            <a href="logout.php" class="btn btn-danger m-2 float-end">Déconnexion</a>
          </div>
        </div>
      </div>
    </div>

  </section>
</main>

<?php include('include/script.php'); ?>
