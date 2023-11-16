<!--><!DOCTYPE html>
<hmtl>
    <head>
        <title>PAGINA CORINGA</title>
    </head>
    <body>
        <h1>PAGINA CORINGA</h1>
    </body>
</html><!-->
<?php
require_once("conexao.php");

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barra de Pesquisa para Filtrar Containers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal1">
        Abrir Modal 1
    </button>

    <!-- Modal 1 -->
    <div class="modal" id="modal1">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Conteúdo da modal 1 -->
                <div class="modal-header">
                    <h5 class="modal-title">Modal 1</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Conteúdo da modal 1 -->
                    aaaaaaa
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <input type="text" id="search" placeholder="Pesquisar">
    </div>
    <div class="container mt-3" id="container-list">
        <div class="row">
            <?php


            $query = $pdo->query("SELECT * FROM projeto");
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            $total_enc = count($res);

            if ($total_enc > 0) {
                //  for ($i=0;$i<$total_enc; $i++) {
                foreach ($res as $key => $value) {
                    echo '<div class="container">';
                    echo '<div class="row">';
                    echo '<div class="col">';
                    echo '<div class="card" style="background-color: #FFA500;">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $value["nome_projeto"] . '</h5>';
                    echo '<p class="card-text">' . $value["info_projeto"] . '</p>';
                    echo '<p class="card-text">' . $value["data_projeto"] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }

                //       } 
            } else {
                echo "Nenhum registro encontrado.";
            }


            ?>

        </div>
    </div>

    <script>
        const searchInput = document.getElementById("search");
        const containerList = document.getElementById("container-list");

        searchInput.addEventListener("input", function () {
            const searchTerm = searchInput.value.toLowerCase();
            const cards = containerList.querySelectorAll(".card");

            cards.forEach((card) => {
                const cardText = card.querySelector(".card-body").textContent.toLowerCase();
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