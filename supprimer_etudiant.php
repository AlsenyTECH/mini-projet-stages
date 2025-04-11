<?php if (isset($_GET['msg']) && $_GET['msg'] == 'supprime'): ?>
  <div class="alert alert-success">Étudiant supprimé avec succès.</div>
<?php endif; ?>

<?php
require_once 'include/connexion.php';

if (isset($_GET['nce'])) {
    $nce = $_GET['nce'];

    try {
        $stmt = $pdo->prepare("DELETE FROM Etudiant WHERE NCE = ?");
        $stmt->execute([$nce]);

        // Redirection après suppression
        header("Location: liste_etudiants.php?msg=supprime");
        exit();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "Aucun étudiant sélectionné.";
}
