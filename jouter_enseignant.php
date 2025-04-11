<?php
require_once 'include/connexion.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matricule = $_POST['matricule'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    if (!empty($matricule) && !empty($nom) && !empty($prenom)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO Enseignant (Matricule, nom_Ens, prenom_Ens) VALUES (?, ?, ?)");
            $stmt->execute([$matricule, $nom, $prenom]);
            $message = "Enseignant ajouté avec succès.";
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
    <h1>Ajouter un enseignant</h1>
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
                <label for="matricule" class="form-label">Matricule</label>
                <input type="number" class="form-control" name="matricule" id="matricule" required>
              </div>
              <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" required>
              </div>
              <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" name="prenom" id="prenom" required>
              </div>
              <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>

          </div>
        </div>

      </div>
    </div>
  </section>
</main>

<?php include('include/script.php'); ?>
