<?php
require_once 'include/connexion.php';

$message = '';

// 1. Récupération des données actuelles de l'étudiant
if (isset($_GET['nce'])) {
    $nce = $_GET['nce'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM Etudiant WHERE NCE = ?");
        $stmt->execute([$nce]);
        $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$etudiant) {
            die("Étudiant non trouvé.");
        }
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
} else {
    die("Aucun étudiant sélectionné.");
}

// 2. Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $classe = $_POST['classe'];

    try {
        $stmt = $pdo->prepare("UPDATE Etudiant SET nom = ?, prenom = ?, classe = ? WHERE NCE = ?");
        $stmt->execute([$nom, $prenom, $classe, $nce]);
        $message = "Modification réussie.";
        // Actualiser les données de l'étudiant
        $etudiant['nom'] = $nom;
        $etudiant['prenom'] = $prenom;
        $etudiant['classe'] = $classe;
    } catch (PDOException $e) {
        $message = "Erreur : " . $e->getMessage();
    }
}
?>

<?php include('include/head.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/navbar.php'); ?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Modifier un étudiant</h1>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-6">

        <?php if ($message): ?>
          <div class="alert alert-info"><?php echo $message; ?></div>
        <?php endif; ?>

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Formulaire de modification</h5>

            <form method="POST" action="">
              <div class="mb-3">
                <label for="nce" class="form-label">NCE</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($etudiant['NCE']); ?>" disabled>
              </div>
              <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" value="<?php echo htmlspecialchars($etudiant['nom']); ?>" required>
              </div>
              <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" name="prenom" value="<?php echo htmlspecialchars($etudiant['prenom']); ?>" required>
              </div>
              <div class="mb-3">
                <label for="classe" class="form-label">Classe</label>
                <input type="text" class="form-control" name="classe" value="<?php echo htmlspecialchars($etudiant['classe']); ?>" required>
              </div>
              <button type="submit" class="btn btn-primary">Modifier</button>
              <a href="liste_etudiants.php" class="btn btn-secondary">Annuler</a>
            </form>

          </div>
        </div>

      </div>
    </div>
  </section>
</main><!-- End #main -->

<?php include('include/script.php'); ?>
