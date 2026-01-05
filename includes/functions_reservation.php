<?php

function getAllReservations($pdo) {
    $sql = "SELECT r.*, v.name 
            FROM reservations r
            JOIN velos v ON r.velo_id = v.id
            ORDER BY r.created_at DESC";
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function createReservation($pdo, $velo_id, $start_date, $end_date, $total_price) {
    $sql = "INSERT INTO reservations 
            (velo_id, start_date, end_date, total_price)
            VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$velo_id, $start_date, $end_date, $total_price]);
}

function updateReservationStatus($pdo, $id, $status) {
    $stmt = $pdo->prepare("UPDATE reservations SET status=? WHERE id=?");
    return $stmt->execute([$status, $id]);
}

function cancelReservation($pdo, $id) {
    return updateReservationStatus($pdo, $id, 'annulée');
}

function checkAvailability($pdo, $velo_id, $start, $end) {
    $sql = "SELECT COUNT(*) FROM reservations
            WHERE velo_id = ?
            AND status = 'validée'
            AND (
                start_date <= ? AND end_date >= ?
            )";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$velo_id, $end, $start]);
    return $stmt->fetchColumn() == 0;
}