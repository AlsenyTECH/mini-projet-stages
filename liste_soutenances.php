<?php
require_once 'include/connexion.php';

$soutenances = $pdo->query("
    SELECT s.Numjury, s.date_soutenance, s.note,
           e.nom AS nom_etudiant, e.prenom AS prenom_etudiant,
           ens.nom_Ens, ens.prenom_Ens
    FROM Soutenance s
    JOIN Etudiant e ON s.NCE = e.NCE
    JOIN Enseignant ens ON s.Matricule = ens.Matricule
")->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include('include/head.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/navbar.php'); ?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Liste des Soutenances</h1>
  </div>

  <section class="section">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Toutes les soutenances</h5>

        <table class="table table-striped datatable">
          <thead>
            <tr>
              <th>Étudiant</th>
              <th>Note</th>
              <th>Enseignant</th>
              <th>Date</th>
              <th>Num Jury</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($soutenances as $s): ?>
              <tr>
                <td><?= $s['nom_etudiant'] . ' ' . $s['prenom_etudiant'] ?></td>
                <td><?= $s['note'] ?></td>
                <td><?= $s['nom_Ens'] . ' ' . $s['prenom_Ens'] ?></td>
                <td><?= $s['date_soutenance'] ?></td>
                <td><?= $s['Numjury'] ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

      </div>
    </div>
  </section>
</main>

<?php include('include/script.php'); ?>
