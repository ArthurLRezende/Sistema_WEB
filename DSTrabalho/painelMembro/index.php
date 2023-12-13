<?php
@session_start();
require_once("verificar.php");
require_once("../conexao.php");

?>
<!DOCTYPE html>
<html>

<head>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="icon" href="../css/LNX.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

    <script src="js/ajax.js"></script>

    <link rel="stylesheet" href="estilo.css">
    <title>PAINEL MEMBRO</title>
</head>

<body>
    <script src="js/ajax.js"></script>

    <nav class="navbar navbar-dark bg-dark fixed-top">
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
                    <ul class="navbar-nav justify-content-end fixed-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Editar
                                Cadastro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalForm">Adicionar
                                projeto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="graficos/index.php" target="_self">Gráficos</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                RH
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#RhModal1">Férias/Day Off</a></li>
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

    <div class="container mt-6 mb-3 pt-3">
        <div class="input-group input-group-sm mb-3">
            <input type="text" class="form-control" id="search" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-sm" placeholder="Pesquisa">
        </div>
    </div>

    <!--TABELA DE CONTAINER-->
    <div class="container mt-3" id="container-list">
        <?php


        $query = $pdo->query('SELECT * FROM projeto');
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $total_enc = count($res);


        if ($total_enc > 0) {
            foreach ($res as $key => $value) {

                $id_projeto = $value['id_projeto'];
                $gerente_projeto = $value['gerente_projeto'];
                $nome_projeto = $value['nome_projeto'];
                $etapa_projeto = $value['etapa_projeto'];
                $data_projeto = $value['data_projeto'];
                $info_projeto = $value['info_projeto'];

                echo '<div class="container mt-1 mb-2">';
                echo '<div class="row">';
                echo '<div class="col-md-8 mx-auto mt-5 mb-5">';
                echo '<div class="card " style="background-color: #EAEAEA;">';
                echo '<div class="card-header text-center " style="background-color: #D8D8D8;">';
                echo '<div class="row justify-content-center">';
                echo '<h4>Projeto: ' . $value['nome_projeto'] . '</h4>';
                echo '<hr class="hr hr-blurry" />';
                echo '</div>';
                echo '<div class="row">';
                echo '<div class="col">';
                echo '<h6> Gerente: ' . $value['gerente_projeto'] . '</h6>';
                echo '</div>';
                echo '<div class="col-5">';
                echo '<h6>Etapa:' . $value['etapa_projeto'] . '</h6>';
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
                echo '<button onclick="inserir(' . $id_projeto . ', \'' . $nome_projeto . '\', \'' . $info_projeto . '\', \'' . $gerente_projeto . '\', \'' . $etapa_projeto . '\', \'' . $data_projeto . '\')" 
            class="btn btn-dark mx-2">EDITAR</button>';
                echo '<button  onclick="excluirProjeto(' . $value['id_projeto'] . ')" class="btn btn-danger mx-2">EXCLUIR</button>';
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
    </div>

    <!--RODAPE-->
    <footer class="bg-light text-lg-start ">

        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Designed by: Eu
        </div>

    </footer>
    <!--MODAIS-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="usuario/editarUsu.php">
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="floatingPassword"
                                        id="floatingPassword" value="<?php echo $_SESSION['$senha_usuario'] ?>">
                                    <label for="floatingPassword">Senha</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="floatingInput" id="floatingInput"
                                        value="<?php echo $_SESSION['$curso_usuario'] ?>">
                                    <label for="floatingInput">Curso</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="form-floating">
                                <select class="form-select" name="floatingSelectGrid" id="floatingSelectGrid" required>
                                    <option selected>Selecione a opção</option>
                                    <option value="Asa Norte">Asa Norte</option>
                                    <option value="Taguatinga">Taguatinga</option>
                                </select>
                                <label for="floatingSelectGrid">Campus:</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="floatingInputValue"
                                    id="floatingInputValue" value="<?php echo $_SESSION['$email_usuario'] ?>">
                                <label for="floatingInputValue">Email:</label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="hidden" name="floatingId" value="<?php echo $_SESSION['$id_usuario'] ?>">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tituloModal">Adicionar Projeto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form" method="post" action="projeto/adicionarProjeto.php">
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="floatingNomePJ" id="floatingNomePJ"
                                        required>
                                    <label for="floatingNomePJ">Nome do projeto:</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="floatingDatePJ" id="floatingDatePJ"
                                        required>
                                    <label for="floatingDatePJ">data:</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="floatingEtapaPJ" id="floatingEtapaPJ" required>
                                        <option selected>Selecione a opção</option>
                                        <option value="Preparação">Preparação</option>
                                        <option value="Andamento">Andamento</option>
                                        <option value="Finalização">Finalização</option>
                                        <option value="Paralisado">Paralisado</option>
                                    </select>
                                    <label for="floatingEtapaPJ">Etapa:</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="floatingGerentePJ"
                                        id="floatingGerentePJ" required>
                                    <label for="floatingGerentePJ">Gerente do projeto:</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-floating">
                                <!--<input type="text" class="form-control" name="floatingInfoPJ">-->
                                <textarea class="form-control" name="floatingInfoPJ" id="floatingInfoPJ"
                                    required></textarea>
                                <label for="floatingInfoPJ">Informações:</label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="hidden" name="floatingId">
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="tituloEditProjeto">Editar Projeto</h5>
                    <button type="button" class="btn-close" id="btnfechar"></button>
                </div>
                <form method="post" action="projeto/editarProjeto.php">
                    <div class="modal-body">
                        <input type="hidden" name="id_projeto" id="id_projeto">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="NomePJ" id="NomePJ" required>
                                    <label for="NomePJ">Nome:</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="DatePJ" id="DatePJ" required>
                                    <label for="DatePJ">data:</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select form-control" name="EtapaPJ" id="EtapaPJ" required>
                                        <option selected>Selecione a opção</option>
                                        <option value="Preparação">Preparação</option>
                                        <option value="Andamento">Andamento</option>
                                        <option value="Finalização">Finalização</option>
                                        <option value="Paralisado">Paralisado</option>
                                    </select>
                                    <label for="EtapaPJ">Etapa:</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="GerentePJ" id="GerentePJ" required>
                                    <label for="GerentePJ">Gerente do projeto:</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-floating">
                                <!--<input type="text" class="form-control" name="floatingInfoPJ">-->
                                <textarea class="form-control" name="info" id="info" required></textarea>
                                <label for="info">Informações:</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
            </div>

            </form>
        </div>
    </div>

    <div class="modal fade" id="RhModal1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Solicitação de Férias / Day Off</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="rh/solicitacao.php">
                    <div class="modal-body">
                        <input type="hidden" name="ra" value="<?php echo $_SESSION['$ra_usuario'] ?>">
                        <input type="hidden" name="tipo" value="Ferias/Dayoff">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="dataI" id="dataI" required>
                                    <label for="dataI">Inicio:</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="dataF" id="dataF" required>
                                    <label for="dataF">Fim:</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="form-floating">
                                <textarea class="form-control" name="infoFerias" id="infoFerias" required></textarea>
                                <label for="infoFerias">Motivo:</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary"> Solicitar </button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const searchInput = document.getElementById("search");
        const containerList = document.getElementById("container-list");

        searchInput.addEventListener("input", function () {
            const searchTerm = searchInput.value.toLowerCase();
            const cards = containerList.querySelectorAll(".card");

            cards.forEach((card) => {
                const cardText = card.querySelector(".card-header").textContent.toLowerCase();
                if (cardText.includes(searchTerm)) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        });
    </script>
</body>

</html>