<?php
// Inclua o arquivo de conexão com o banco de dados
require 'Functions.php';

// Verifique se o ID da reserva foi fornecido
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Se o formulário foi enviado, processe a atualização
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $modelo = $_POST['veiculo_reservado'];
        $data_reserva = $_POST['data_reserva'];
        $data_devolucao = $_POST['data_devolucao'];
        $cliente_reserva = $_POST['cliente_reserva'];

        // Atualize a reserva no banco de dados
        $query = "UPDATE reservas SET veiculo_reservado = ?, data_reserva = ?, data_devolucao = ?, cliente_reserva = ? WHERE id_reserva = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssi', $veiculo_reservado, $data_reserva, $data_devolucao, $cliente_reserva, $id_reserva);

        if ($stmt->execute()) {
            echo "Reserva atualizada com sucesso!";
        } else {
            echo "Erro ao atualizar a reserva: " . $conn->erro;
        }
    } else {
        // Obtenha os detalhes da reserva para preencher o formulário
        $query = "SELECT * FROM reservas WHERE id_reserva = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id_reserva);
        $stmt->execute();
        $result = $stmt->get_result();
        $reserva = $result->fetch_assoc();
    }
} else {
    echo "ID da reserva não fornecido.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Reserva</title>
</head>
<body>
    <h1>Atualizar Reserva</h1>
    <form action="update_reserva.php?id=<?=$id?>" method="post">
        <label for="veiculo_reservado">veiculo_reservado:</label><br>
        <input type="text" id="veiculo_reservado" name="veiculo_reservado" value="<?=$reserva['modelo']?>"><br>
        <label for="data_reserva">Data de Retirada:</label><br>
        
