<?php
require_once 'include/connexion.php';

try {
    $stmt = $pdo->query("SELECT * FROM Etudiant");
    $etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>

<?php include('include/head.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/navbar.php'); ?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Liste des étudiants</h1>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Tous les étudiants</h5>

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">NCE</th>
              <th scope="col">Nom</th>
              <th scope="col">Prénom</th>
              <th scope="col">Classe</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($etudiants as $etudiant): ?>
              <tr>
                <td><?php echo htmlspecialchars($etudiant['NCE']); ?></td>
                <td><?php echo htmlspecialchars($etudiant['nom']); ?></td>
                <td><?php echo htmlspecialchars($etudiant['prenom']); ?></td>
                <td><?php echo htmlspecialchars($etudiant['classe']); ?></td>
                <td>
                  <a href="modifier_etudiant.php?nce=<?php echo $etudiant['NCE']; ?>" class="btn btn-sm btn-warning">Modifier</a>
                  <a href="supprimer_etudiant.php?nce=<?php echo $etudiant['NCE']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?');">Supprimer</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

      </div>
    </div>
  </section>
</main><!-- End #main -->

<?php include('include/script.php'); ?>
