<?php

function getAllVelos($pdo) {
    return $pdo->query("SELECT * FROM velos")->fetchAll(PDO::FETCH_ASSOC);
}

function getVeloById($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM velos WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addVelo($pdo, $data) {
    $sql = "INSERT INTO velos (name, price, quantity, description, image_url)
            VALUES (:name, :price, :quantity, :description, :image_url)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute($data);
}

function updateVelo($pdo, $id, $data) {
    $data['id'] = $id;
    $sql = "UPDATE velos SET
            name=:name, price=:price, quantity=:quantity,
            description=:description, image_url=:image_url
            WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute($data);
}

function deleteVelo($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM velos WHERE id = ?");
    return $stmt->execute([$id]);
}

function createDatabase($pdo,$sqlfile) {
    $query = file_get_contents($sqlfile);
    $pdo->exec($query);
}