<?php
require '../config/db_connect.php';
require '../includes/functions_velos.php';

$velos = getAllVelos($pdo);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>RESAVELO 🚲</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>

<header class="header">
    <h1 class="logo">RESAVELO</h1>
    <p class="subtitle">Location de vélos – Ride into the 80’s</p>
</header>

<main class="catalogue">

    <?php foreach ($velos as $velo): ?>
        <div class="velo-card">
            <div class="velo-content">
                <h3><?= htmlspecialchars($velo['name']) ?></h3>
                <p class="price"><?= $velo['price'] ?> € / jour</p>
                <a href="reservation_form.php?id=<?= $velo['id'] ?>" class="btn-neon">Réserver</a>
            </div>
        </div>
    <?php endforeach; ?>

</main>

</body>
</html>