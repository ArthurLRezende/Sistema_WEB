function inserir(id, nome, info, gerente, etapa, data ){
    
   
    $('#id_projeto').val(id);
    $('#info').val(info);
    $('#GerentePJ').val(gerente);
    $('#EtapaPJ').val(etapa);
    $('#DatePJ').val(data);
    $('#NomePJ').val(nome);
    

    var myModal = new bootstrap.Modal(document.getElementById('exampleModalToggle'), {
		backdrop: 'static',
	});

    myModal.show();


}


function excluirProjeto(idprojeto){


    var id = idprojeto;

    console.log(id);

    $.ajax({
        type: 'POST',
        url: 'projeto/excluirProjeto.php',
        data: {

            id:id 
        },
        success: function (response) {
            // A resposta do servidor
            console.log(response);
            window.location="index.php";
        },
        error: function (error) {
            console.log(error);
        }
    });

}

    $('#btnfechar').click(function(){
        window.location="index.php" ;
    });


