<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réserver un vélo</title>
    <link rel="stylesheet" href="../assets/css/forms.css">
</head>
<body>

<div class="container">
    <h1>Réserver ce vélo 🚲</h1>

    <form method="POST" action="">
        <!-- ID du vélo (caché) -->
        <input type="hidden" name="velo_id" value="<?= htmlspecialchars($_GET['id'] ?? '') ?>">

        <div class="form-group">
            <label for="start_date">Date de début</label>
            <input type="date" id="start_date" name="start_date" required>
        </div>

        <div class="form-group">
            <label for="end_date">Date de fin</label>
            <input type="date" id="end_date" name="end_date" required>
        </div>

        <button type="submit" class="btn">Valider la réservation</button>
    </form>

    <a href="index.php" class="back-link">← Retour au catalogue</a>
</div>

</body>
</html>