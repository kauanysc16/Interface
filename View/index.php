<?php
include 'functions.php';

// Incluindo o cabeçalho da página
template_header("Locadora de Carros");

// Estilos CSS
echo <<<EOT
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            text-align: center;
        }

        h2 {
            color: #333;
            font-size: 36px;
            margin-bottom: 20px;
        }

        p {
            color: #666;
            font-size: 18px;
            margin-bottom: 30px;
        }

        .btn-primary {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
EOT;

// Conteúdo da página
echo <<<EOT
    <div class="container">
        <h2>Bem-vindo à Locadora de Carros Kauany</h2>
        <p>Encontre os melhores carros para alugar e explore novos horizontes com conforto e segurança.</p>
        <a href="/View/ClienteView.php" class="btn-primary">Ver Carros Disponíveis</a>
    </div>
EOT;

// Incluindo o footer da página
template_footer();
?>
