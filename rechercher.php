<?php
require_once 'include/connexion.php';
$enseignants = $pdo->query("SELECT Matricule, nom_Ens FROM Enseignant")->fetchAll(PDO::FETCH_ASSOC);
$resultats = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matricule = $_POST['matricule'] ?? '';
    $date = $_POST['date_soutenance'] ?? '';

    if ($matricule && $date) {
        $stmt = $pdo->prepare("
            SELECT s.Numjury, s.note, s.date_soutenance,
                   e.nom, e.prenom
            FROM Soutenance s
            JOIN Etudiant e ON s.NCE = e.NCE
            WHERE s.date_soutenance = ? AND s.Matricule = ?
        ");
        $stmt->execute([$date, $matricule]);
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

<?php include('include/head.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/navbar.php'); ?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Recherche de soutenances</h1>
  </div>

  <section class="section">
    <div class="card p-3">
      <form method="POST">
        <div class="row mb-3">
          <div class="col-md-6">
            <label>Choisissez un enseignant</label>
            <select name="matricule" class="form-control" required>
              <option value="">-- Sélectionner --</option>
              <?php foreach ($enseignants as $ens): ?>
                <option value="<?= $ens['Matricule'] ?>"><?= $ens['nom_Ens'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-6">
            <label>Date de soutenance</label>
            <input type="date" name="date_soutenance" class="form-control" required>
          </div>
        </div>
        <button class="btn btn-primary" type="submit">Rechercher</button>
      </form>
    </div>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
      <div class="card mt-4">
        <div class="card-body">
          <h5 class="card-title">Résultats</h5>
          <?php if ($resultats): ?>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Nom Étudiant</th>
                  <th>Prénom</th>
                  <th>Note</th>
                  <th>Date</th>
                  <th>Jury</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($resultats as $r): ?>
                  <tr>
                    <td><?= $r['nom'] ?></td>
                    <td><?= $r['prenom'] ?></td>
                    <td><?= $r['note'] ?></td>
                    <td><?= $r['date_soutenance'] ?></td>
                    <td><?= $r['Numjury'] ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else: ?>
            <p>Aucune soutenance trouvée.</p>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>
  </section>
</main>

<?php include('include/script.php'); ?>
