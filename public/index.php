<?php
require '../config/db_connect.php';
require '../includes/functions_velos.php';

$velos = getAllVelos($pdo);
?>

<h1>Catalogue des vélos</h1>

<?php foreach ($velos as $velo): ?>
    <div>
        <h3><?= htmlspecialchars($velo['name']) ?></h3>
        <p><?= $velo['price'] ?> € / jour</p>
        <a href="reservation_form.php?id=<?= $velo['id'] ?>">Réserver</a>
    </div>
<?php endforeach; ?>