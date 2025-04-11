<?php
require_once 'include/connexion.php';
$message = '';

// Récupération des étudiants et enseignants
$etudiants = $pdo->query("SELECT NCE, nom FROM Etudiant")->fetchAll(PDO::FETCH_ASSOC);
$enseignants = $pdo->query("SELECT Matricule, nom_Ens FROM Enseignant")->fetchAll(PDO::FETCH_ASSOC);

// Gestion du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numjury = $_POST['numjury'];
    $date_soutenance = $_POST['date_soutenance'];
    $note = $_POST['note'];
    $nce = $_POST['nce'];
    $matricule = $_POST['matricule'];

    if ($numjury && $date_soutenance && $note && $nce && $matricule) {
        try {
            // Vérifier si une soutenance existe déjà pour cet étudiant
            $check = $pdo->prepare("SELECT COUNT(*) FROM Soutenance WHERE NCE = ?");
            $check->execute([$nce]);

            if ($check->fetchColumn() > 0) {
                $message = "Cet étudiant a déjà une soutenance enregistrée.";
            } else {
                // Insérer la nouvelle soutenance
                $stmt = $pdo->prepare("INSERT INTO Soutenance (Numjury, date_soutenance, note, NCE, Matricule) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$numjury, $date_soutenance, $note, $nce, $matricule]);

                // Redirection pour éviter la double soumission
                header('Location: ajouter_soutenance.php?success=1');
                exit;
            }
        } catch (PDOException $e) {
            $message = "Erreur : " . $e->getMessage();
        }
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
}
?>

<?php include('include/head.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/navbar.php'); ?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Ajouter une soutenance</h1>
  </div>

  <section class="section">
    <div class="col-lg-6">
      <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success">Soutenance ajoutée avec succès.</div>
      <?php elseif ($message): ?>
        <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
      <?php endif; ?>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Formulaire d'ajout</h5>
          <form method="POST">
            <div class="mb-3">
              <label>Numéro de Jury</label>
              <input type="number" name="numjury" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Date de soutenance</label>
              <input type="date" name="date_soutenance" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Note</label>
              <input type="number" step="0.01" name="note" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Étudiant</label>
              <select name="nce" class="form-control" required>
                <option value="">-- Sélectionnez un étudiant --</option>
                <?php foreach ($etudiants as $e): ?>
                  <option value="<?= htmlspecialchars($e['NCE']) ?>"><?= htmlspecialchars($e['nom']) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label>Enseignant</label>
              <select name="matricule" class="form-control" required>
                <option value="">-- Sélectionnez un enseignant --</option>
                <?php foreach ($enseignants as $ens): ?>
                  <option value="<?= htmlspecialchars($ens['Matricule']) ?>"><?= htmlspecialchars($ens['nom_Ens']) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
            <a href="liste_soutenances.php" class="btn btn-secondary">Retour à la liste</a>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>

<?php include('include/script.php'); ?>
