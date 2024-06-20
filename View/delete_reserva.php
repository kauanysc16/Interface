<?php
// Conecte ao banco de dados
include 'Functions.php';

if (isset($_GET['id'])) {
    $id_reserva = $_GET['id'];

    // Delete a reserva pelo ID
    $query = $pdo->prepare("DELETE FROM reservas WHERE id = ?");
    $query->execute([$id]);

    header("Location: clienteView.php");
    exit();
} else {
    die("ID de reserva não fornecido.");
}
?>
