<?php
// Connexion à la base de données
require_once 'include/connexion.php';

// Traitement du formulaire
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nce = $_POST['nce'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $classe = $_POST['classe'];

    if (!empty($nce) && !empty($nom) && !empty($prenom) && !empty($classe)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO Etudiant (NCE, nom, prenom, classe) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nce, $nom, $prenom, $classe]);
            $message = "Étudiant ajouté avec succès.";
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
    <h1>Ajouter un étudiant</h1>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-6">

        <?php if ($message): ?>
          <div class="alert alert-info"><?php echo $message; ?></div>
        <?php endif; ?>

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Formulaire d'ajout</h5>

            <form method="POST" action="">
              <div class="mb-3">
                <label for="nce" class="form-label">NCE</label>
                <input type="number" class="form-control" name="nce" id="nce" required>
              </div>
              <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" required>
              </div>
              <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" name="prenom" id="prenom" required>
              </div>
              <div class="mb-3">
                <label for="classe" class="form-label">Classe</label>
                <input type="text" class="form-control" name="classe" id="classe" required>
              </div>
              <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>

          </div>
        </div>

      </div>
    </div>
  </section>
</main><!-- End #main -->

<?php include('include/script.php'); ?>
