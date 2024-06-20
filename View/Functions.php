<?php

function pdo_connect_pgsql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_PORT = '8080';
    $DATABASE_USER = 'postgres';
    $DATABASE_PASS = 'postgres';
    $DATABASE_NAME = 'bd_locadora_kauany';
    try {
        $pdo = new PDO('pgsql:host=' . $DATABASE_HOST . ';port=' . $DATABASE_PORT . ';dbname=' . $DATABASE_NAME . ';user=' . $DATABASE_USER . ';password=' . $DATABASE_PASS);
        // Define o modo de erro para Exception para que os erros sejam lançados e possam ser capturados.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $exception) {
        // Log do erro ou exibição de mensagem mais detalhada.
        $errorDetails = 'Error details: ' . $exception->getMessage() . ' Code: ' . $exception->getCode();
        error_log('Failed to connect to database: ' . $errorDetails);
        exit('Failed to connect to database. Check error log for details. Debug: ' . $errorDetails);
    }
}

function template_header($title) {
    echo <<<EOT
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>$title</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .navtop {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        .navtop h1 {
            margin: 0;
            font-size: 24px;
        }

        .navtop a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
            font-size: 18px;
        }

        .navtop a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <nav class="navtop">
        <div>
            <h1>Locadora de Carros - Kauany</h1>
            <a href="/View/FuncionarioLogin.php"><i class="fas fa-home"></i> Login</a>
            <a href="/View/Carros.php"><i class="fas fa-shopping-basket"></i> Carros</a>
        </div>
    </nav>
EOT;
}

// Função para gerar o footer da página
function template_footer() {
    echo <<<EOT
    <style>
        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .footer p {
            margin: 0;
            font-size: 14px;
        }
    </style>
    <div class="footer">
        <p>&copy; 2024 Locadora de Carros. Todos os direitos reservados.</p>
    </div>
    </body>
    </html>
    EOT;
}

function area_cliente_header() {
    echo <<<EOT
    <h1>Área do Cliente</h1>
    <h2>Reservar Carro</h2>
    <form action="reservar_carro.php" method="post">
        <label for="veiculo_reservado">Modelo do carro:</label><br>
        <input type="text" id="veiculo_reservado" name="veiculo_reservado"><br>
        <label for="data_reserva">Data de Retirada:</label><br>
        <input type="date" id="data_reserva" name="data_reserva"><br>
        <label for="data_devolucao">Data de Devolução:</label><br>
        <input type="date" id="data_devolucao" name="data_devolucao"><br><br>
        <input type="submit" name="submit_reserva" value="Reservar">
    </form>
    <hr>
    <h2>Minhas Locações</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Modelo do carro</th>
                <th>Data de Reserva</th>
                <th>Data de Devolução</th>
                <th>Cliente</th>
            </tr>
        </thead>
        <tbody>
EOT;
}

function area_funcionario_header() {
    // Verifica se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Conecte ao banco de dados (substitua com suas credenciais)
        $servername = "localhost";
        $username = "postgres";
        $password = "postgres";
        $dbname = "bd_locadora_kauany";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // Set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Preparar a inserção dos dados
            $stmt = $conn->prepare("INSERT INTO carros (modelo, ano, placa, tipo, disponibilidade) 
                                    VALUES (:modelo, :ano, :placa, :tipo, :disponibilidade)");

            // Bind parameters
            $stmt->bindParam(':modelo', $_POST['modelo']);
            $stmt->bindParam(':ano', $_POST['ano']);
            $stmt->bindParam(':placa', $_POST['placa']);
            $stmt->bindParam(':tipo', $_POST['tipo']);
            $stmt->bindParam(':disponibilidade', $_POST['disponibilidade']);

            // Executar a inserção
            $stmt->execute();

            echo '<div class="success">Carro cadastrado com sucesso!</div>';

        } catch(PDOException $e) {
            echo '<div class="error">Erro ao cadastrar o carro: ' . $e->getMessage() . '</div>';
        }

        // Fechar a conexão
        $conn = null;
    }

    // Aqui começa o código HTML
    echo <<<EOT
    <h1>Área do Funcionário</h1>
    <h2>Cadastrar Novo Carro</h2>
    <form action="FuncionarioView.php" method="post">
        <label for="modelo">Modelo:</label><br>
        <input type="text" id="modelo" name="modelo"><br>
        <label for="ano">Ano:</label><br>
        <input type="text" id="ano" name="ano"><br>
        <label for="placa">Placa:</label><br>
        <input type="text" id="placa" name="placa"><br>
        <label for="tipo">Tipo:</label><br>
        <input type="text" id="tipo" name="tipo"><br>
        <label for="disponibilidade">Disponibilidade:</label><br>
        <input type="text" id="disponibilidade" name="disponibilidade"><br><br>
        <input type="submit" value="Cadastrar">
    </form>
    <hr>
    <h2>Administrar Carros</h2>
    <ul>
EOT;

}

?>
