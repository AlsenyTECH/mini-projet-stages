

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion</title>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height:100vh">
  <div class="card p-4" style="min-width: 400px;">
    <h4 class="text-center">Connexion Administrateur</h4>
    <form action="login.php" method="POST">
      <div class="form-group mb-3">
        <label>Login</label>
        <input type="text" name="login" class="form-control" required>
      </div>
      <div class="form-group mb-3">
        <label>Mot de passe</label>
        <input type="password" name="mot_de_passe" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Connexion</button>
    </form>
  </div>
</body>
</html>
