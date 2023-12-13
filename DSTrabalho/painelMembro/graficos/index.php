<?php

@session_start();
require_once("../verificar.php");
require_once("../../conexao.php");


$query = $pdo->query('SELECT * FROM projeto');
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total = count($res);

$array_gerentes = array();
$array_etapa = array();

foreach ($res as $row => $value) {

    $array_gerentes[] = $value['gerente_projeto'];
    $array_etapa[] = $value['etapa_projeto'];

}

$array_gerentes_unico = array_values(array_unique($array_gerentes));
$quant_projeto_gerente = array_count_values($array_gerentes);
$array_etapa_unico = array_values(array_unique($array_etapa));
$quant_etapa_projeto = array_count_values($array_etapa);

$quant_projeto_gerente_json = json_encode($quant_projeto_gerente);
$array_gerente_json = json_encode($array_gerentes_unico);
$array_etapa_json = json_encode($array_etapa_unico);
$quant_etapa_projeto_json = json_encode($quant_etapa_projeto);



?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Título da página</title>
    <meta charset="utf-8">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="icon" href="../../css/LNX.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="estilografico.css">

</head>

<body>

    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid mt-6 mb-6 fixed-top" style="background-color: #787672"></div>
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">
            <i class="fas fa-arrow-left"></i>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
                aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">MENU</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end fixed-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="gerarPdf.php">Gerar PDF</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../logout.php">SAIR</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid mt-6">

    </div>

    <div class="container-fluid text-center">
        <h2>Infográfico</h2>
        <hr>
        <div class="row justify-content-evenly">
            <div class="chart-container" style="position:relative; height:40vh; width:40vw">
                <canvas id="myChart"></canvas>
            </div>
            <div class="chart-container" style="position:relative; height:40vh; width:40vw">
                <canvas id="myChar"></canvas>
            </div>
        </div>
        <hr>
        <h2> Informações Projetos</h2>
        <hr>
    </div>
    <div class="container text-center mt-6 mb-6">
        
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">ID </th>
                    <th scope="col">Projeto</th>
                    <th scope="col">GERENTE</th>
                    <th scope="col">DATA DE ENTREGA:</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($res as $row => $value) {
                    echo '<tr>';
                    echo '<td>'. $value['id_projeto'] .'</td>';
                    echo '<td>' . $value['nome_projeto'] . '</td>';
                    echo '<td>' . $value['gerente_projeto'] . '</td>';
                    echo '<td>' . $value['data_projeto'] . '</td>';
                    echo '</tr>';
                }
                ?>

            </tbody>
        </table>
    </div>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo $array_gerente_json; ?>,
                datasets: [{
                    label: ' GERENTE X PROJETOS',
                    data: <?php echo $quant_projeto_gerente_json; ?>,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        const cto = document.getElementById('myChar');

        new Chart(cto, {
            type: 'line',
            data: {
                labels: <?php echo $array_etapa_json; ?>,
                datasets: [{
                    label: 'Projetos X Etapas',
                    data: <?php echo $quant_etapa_projeto_json; ?>,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>


</body>

</html>