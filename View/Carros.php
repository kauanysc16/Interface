<?php
include 'functions.php';

// Incluindo o cabeçalho da página
template_header("Carros Disponíveis");

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
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .card {
            width: calc(30% - 20px);
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
        }

        .card img {
            width: 100%;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-content {
            padding: 20px;
        }

        .card h3 {
            margin-top: 0;
            color: #333;
        }

        .card p {
            color: #666;
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
echo '<div class="container">';

// Simulação de dados de carros
$carros = array(
    array(
        'imagem' => 'carro1.jpg',
        'modelo' => 'Fiat Argo',
        'ano' => '2022',
        'preco' => 'R$ 120/dia'
    ),
    array(
        'imagem' => 'carro2.jpg',
        'modelo' => 'Volkswagen Gol',
        'ano' => '2021',
        'preco' => 'R$ 100/dia'
    ),
    array(
        'imagem' => 'carro3.jpg',
        'modelo' => 'Ford Ka',
        'ano' => '2020',
        'preco' => 'R$ 90/dia'
    )
);

// Gerando os cards de carros disponíveis
foreach ($carros as $carro) {
    echo '<div class="card">';
    echo '<img src="' . $carro['imagem'] . '" alt="' . $carro['modelo'] . '">';
    echo '<div class="card-content">';
    echo '<h3>' . $carro['modelo'] . ' - ' . $carro['ano'] . '</h3>';
    echo '<p><strong>Preço:</strong> ' . $carro['preco'] . '</p>';
    echo '<a href="#" class="btn-primary">Alugar Agora</a>';
    echo '</div>';
    echo '</div>';
}

echo '</div>';

// Incluindo o footer da página
template_footer();
?>
