<?php
@session_start();
require_once("verificar.php");
require_once("../conexao.php");

?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estilo.css">
    <title>PAINEL MEMBRO</title>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid mt-6 mb-6 fixed-top" style="background-color: #787672">
            <div class="container pt-2 pb-2" style="background-color: #cfccc4;">
                <div class="row justify-content-center">
                    <div class="col text-center">
                        <input type="text" id="search" placeholder="Pesquisar">
                    </div>
                    <div class="col text-center">
                        <input type="text" id="search" placeholder="Data">
                    </div>
                    <div class="col text-center">
                        <input type="text" id="search" placeholder="Gerente">
                    </div>
                    <div class="col text-center">
                        <button type="button" class="btn btn-success">Filtrar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <?php echo 'Olá, ' . $_SESSION['$nome_usuario'] . '!'; ?>
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
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Editar
                                Cadastro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop1">Adicionar
                                projeto</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                GeG
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="#">1:1</a></li>
                                <li><a class="dropdown-item" href="#">Férias/Day off</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Desligamento</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">SAIR</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>


    <?php


    $query = $pdo->query('SELECT * FROM projeto');
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $total_enc = count($res);

    if ($total_enc > 0) {
        foreach ($res as $key => $value) {
            echo '<div class="container mt-6 mb-3">';
            echo '<div class="row">';
            echo '<div class="col-md-8 mx-auto mt-5 ">';
            echo '<div class="card " style="background-color: #FFA500;">';
            echo '<div class="card-header text-center " style="background-color: #0DE07E;">';
            echo '<div class="row justify-content-center">';
            echo '<h4>Projeto: ' . $value['nome_projeto'] . $value['id_projeto'] . '</h4>';
            echo '<hr class="hr hr-blurry" />';
            echo '</div>';
            echo '<div class="row">';
            echo '<div class="col">';
            echo '<h6> Gerente: ' . $value['gerente_projeto'] . '</h6>';
            echo '</div>';
            echo '<div class="col-5">';
            echo '<h6>Etapa:</h6>';
            echo '</div>';
            echo '<div class="col">';
            echo '<h6>' . $value['data_projeto'] . '</h6>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="card-body">';
            echo '<p class="card-text">' . $value['info_projeto'] . '</p>';
            echo '<div class="row justify-content-end">';
            echo '<div class="col-auto">';
            echo '<button class="btn btn-dark">EDITAR</button>'; //linkar a uma pagina modal
            echo '<form method="post" action="excluir.php" style="background-color: #0DE07E;">';
            echo '<input type="hidden" name="id" value="' . $value['id_projeto'] . '">';
            echo '<button type="submit" class="btn btn-danger mx-2">EXCLUIR</button>';
            echo '</form>'; // mandar o id do projeto e executar o drop da row 
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "Nenhum registro encontrado.";
    }
    ?>

    <div class="modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">DADOS PESSOAIS</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="floatingPassword"
                                    value="<?php echo $_SESSION['$senha_usuario'] ?>">
                                <label for="floatingPassword">Senha</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput"
                                    value="<?php echo $_SESSION['$curso_usuario'] ?>">
                                <label for="floatingInput">Curso</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelectGrid">
                                <option selected>Selecione a opção</option>
                                <option value="1">Asa Norte</option>
                                <option value="2">Taguatinga</option>
                            </select>
                            <label for="floatingSelectGrid">Campus:</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <form class="form-floating">
                            <input type="email" class="form-control" id="floatingInputValue"
                                value="<?php echo $_SESSION['$email_usuario'] ?>">
                            <label for="floatingInputValue">Email:</label>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary">Editar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel1">DADOS PESSOAIS</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="floatingPassword"
                                        placeholder="Senha">
                                    <label for="floatingPassword">Senha</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Curso">
                                    <label for="floatingInput">Curso</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelectGrid">
                                    <option selected>Selecione</option>
                                    <option value="1">Asa Norte</option>
                                    <option value="2">Taguatinga</option>
                                </select>
                                <label for="floatingSelectGrid">Campus:</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <form class="form-floating">
                                <input type="email" class="form-control" id="floatingInputValue"
                                    placeholder="name@example.com">
                                <label for="floatingInputValue">Email:</label>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-primary">Editar</button>
                        </div>
                    </div>
                </div>
            </div>



</body>

</html>