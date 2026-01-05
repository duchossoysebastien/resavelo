<?php
// récupérer l'id du vélo
$velo_id = $_GET['id'] ?? '';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réserver un vélo</title>
    <link rel="stylesheet" href="../assets/css/forms.css">
</head>
<body>

<header class="header">
    <h1 class="logo">RESAVELO</h1>
    <p class="subtitle">Réserver votre vélo – Ride into the 80’s</p>
</header>

<main class="form-container">

    <form method="POST" action="">
        <input type="hidden" name="velo_id" value="<?= htmlspecialchars($velo_id) ?>">

        <div class="form-group">
            <label for="start_date">Date de début</label>
            <input type="date" id="start_date" name="start_date" required>
        </div>

        <div class="form-group">
            <label for="end_date">Date de fin</label>
            <input type="date" id="end_date" name="end_date" required>
        </div>

        <button type="submit" class="btn-neon">Valider la réservation</button>
    </form>

    <a href="index.php" class="back-link">← Retour au catalogue</a>

</main>

</body>
</html>