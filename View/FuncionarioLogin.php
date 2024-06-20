<?php
include 'functions.php';

// Incluindo o cabeçalho da página
template_header("Login Funcionário");

// Estilos CSS
echo <<<EOT
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .submit-link {
            display: block;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            transition: background-color 0.3s;
            font-size: 16px;
        }

        .submit-link:hover {
            background-color: #0056b3;
        }
    </style>
EOT;

// Conteúdo da página
echo '<div class="container">';
echo '<h2>Login Funcionário</h2>';
echo '<form id="loginForm" action="FuncionarioView.php" method="post">';
echo '<label for="username">Usuário:</label>';
echo '<input type="text" id="username" name="username" required><br>';
echo '<label for="password">Senha:</label>';
echo '<input type="password" id="password" name="password" required><br>';
echo '<a href="/View/FuncionarioView.php" class="submit-link">Entrar</a>';
echo '</form>';
echo '</div>';

// Incluindo o footer da página
template_footer();
?>
