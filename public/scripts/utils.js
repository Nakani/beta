$(function(){
   $(document).on('click', '.apagar', function(e){
     var nome = $(this).attr("data-nome");
     var email = $(this).attr("data-email");
     var link_delete = $(this).attr("data-delete");
     e.preventDefault();
     $("#apagar").find(".modal-body").html(
       '<p> Você tem certeza que deseja remover esse item?</p>'+
       '<p><strong>'+nome+'</strong>' +
       '<h5>'+email+'<h5></p>'
     )
     $("#apagar").find("#confirm").attr("href", link_delete)
     $("#apagar").modal();
     return false;
   });


   // historias respostas
   $(document).on('click', '#nome', function(e){
		var id = $(this).attr("data-id");
		var idCampanha = $(this).attr("data-idCampanha");
	  	$.ajax({
		  method:"GET",
		  url: url+'/historia-respostas',
		  data: {'id':id,'idCampanha':idCampanha},
		  dataType:'html',
		  success: function(data) 
		  {
		  	$('#respostas').html(data);
		  }
	  	});
	});   

	// cadasrar respostas
   $(document).on('click', '#cadastrarResp', function(e){

		var idPergunta = $(this).attr("data-idPergunta");
		var idCampanha = $(this).attr("data-idCampanha");
		var conteudo = $(this).attr("data-conteudo");
		if(idPergunta!=undefined){
			$('#opcoesHeader').html(idPergunta+' - '+conteudo);
		}
		else{
			$('#opcoesHeader').html('Nova pergunta');
		}
		array = [idPergunta];
		$('#opcoes').val(JSON.stringify(array));
		$('#opcao-'+idPergunta).addClass('disabled');


	  	$.ajax({
		  method:"GET",
		  url: url+'/historia-respostas',
		  data: {'id':idPergunta,'idCampanha':idCampanha},
		  dataType:'html',
		  success: function(data) 
		  {
		  	$('#respostasResp').html(data);			
			$("#adicionarHistoria").modal();
			return false;
		  }
	  	});
			return false;
	});

   $(document).on('click', '#editarResp', function(e){
		var idPergunta 	= $(this).attr("data-idPergunta");
		var idCampanha 	= $(this).attr("data-idCampanha");
		var idFase 		= $(this).attr("data-idFase");
		$('#opcoesHeader').html(idPergunta);
		$('opcoesEdit').val(idPergunta);
	  	$.ajax({
		  method:"GET",
		  url: url+'/editarHistoria',
		  data: {'id':idPergunta, 'idCampanha':idCampanha, 'idFase':idFase},
		  dataType:'html',
		  success: function(data) 
		  {
		  	$('#formEditar').html(data);
			$("#EditarHistoria").modal();			
			return false;
		  }
	  	});
			return false;
	});

	$(document).on('click', '#adicionarOpcaoEdit', function(e){
			var id_opcaoEdit = $('#vincularOpcaoEdit').val();
			var nomeEdit = $('#opcaoEdit-'+id_opcaoEdit).text();
			var arrayOpcoesEdit = $('#opcoesEdit').val();
			console.log(arrayOpcoesEdit);
			$('#opcoesVinculoEdit').append('<tr id="removerOpcaoEdit" data-id="'+id_opcaoEdit+'"><td>'+nomeEdit+'</td><td><i class="fa fa-trash"></i></td></tr>');
			$("select#vincularOpcaoEdit")[0].selectedIndex = 0;
			$('#opcaoEdit-'+id_opcaoEdit).addClass('disabled');
			var arrayEdit = [id_opcaoEdit];
				if(arrayOpcoesEdit=='')
				{
					arrayEdit = [id_opcaoEdit];
					$('#opcoesEdit').val(JSON.stringify(arrayEdit));
				}else
				{
					arrayEdit = JSON.parse(arrayOpcoesEdit);
					arrayEdit.push(id_opcaoEdit);
					$('#opcoesEdit').val(JSON.stringify(arrayEdit));
				}
	});

	$(document).on('click', '#removerOpcaoEdit', function(e){
		var id_opcao = $(this).attr("data-id");
		var arrayOpcoesEdit = $('#opcoesEdit').val();
		console.log(arrayOpcoesEdit);
		$('#opcaoEdit-'+id_opcao).removeClass('disabled');
		$(this).remove();
		array = JSON.parse(arrayOpcoesEdit);
		array = AcharRemoverOpcao(array, id_opcao,'edit');
	});

   // Funções para carregar
	avisoModulo();
	adicionarAtributos();
	adicionarOpcoes();
	removerAtributos();
	removerOpcao();
});



	function avisoModulo(){
		$(".desativado").on('click', function(){
			alert('Módulo indisponível');
		});
	}
// historia
	function adicionarAtributos(){
		$("#adicionarAtributo").on('click', function(){
			var id_atributo = $('#atributoSelect').val();
			var nome = $('#atributo-'+id_atributo).text();
			var pontuacao = $('#pontuacao').val();
			var array = [{'id_atributo':id_atributo,'pontuacao':pontuacao}];
			var arrayAtributos = $('#arrayAtributos').val();
			$('#atributos').append('<tr id="removerAtributo" data-id="'+id_atributo+'" data-pont="'+pontuacao+'" ><td>'+nome+'</td><td>'+pontuacao+'</td><td><i class="fa fa-trash"></i></td></tr>');
			$('#atributo-'+id_atributo).addClass('disabled');
			$('#arrayAtributos').val(JSON.stringify(array));
			$("select#atributoSelect")[0].selectedIndex = 0;
			$('#atributo-'+id_atributo).addClass('disabled');
			$('#pontuacao').val('');

				if(arrayAtributos=='')
				{
					array = [{'id_atributo':id_atributo,'pontuacao':pontuacao}];
					$('#arrayAtributos').val(JSON.stringify(array));
				}else
				{
					array = JSON.parse(arrayAtributos);
					array.push({'id_atributo':id_atributo,'pontuacao':pontuacao});
					$('#arrayAtributos').val(JSON.stringify(array));
				}
			removerAtributos();
		});
	}

	function removerAtributos(){
		$("#removerAtributo").on('click', function(){
			var arrayAtributos = $('#arrayAtributos').val();
			var id_atributo = $(this).attr("data-id");
			var pontuacao = $(this).attr("data-pont");
			$(this).remove();
			array = JSON.parse(arrayAtributos);

			array = AcharRemoverAtributo(array, id_atributo);

		$('#atributo-'+id_atributo).removeClass('disabled');
			removerAtributos();
		});
	}

	function AcharRemoverAtributo(array, id) {
		$.each(array, function(key, value) {
			if(value.id_atributo == id) {
				array.splice(key, 1);
				$('#arrayAtributos').val(JSON.stringify(array));
				removerAtributos();
				return false;
			}    
		});
	}

	function adicionarOpcoes(){
		$("#adicionarOpcao").on('click', function(){
			var id_opcao = $('#vincularOpcao').val();
			var nome = $('#opcao-'+id_opcao).text();
			var arrayOpcoes = $('#opcoes').val();
			$('#opcoesVinculo').append('<tr id="removerOpcao" data-id="'+id_opcao+'"><td>'+nome+'</td><td><i class="fa fa-trash"></i></td></tr>');
			$("select#vincularOpcao")[0].selectedIndex = 0;
			$('#opcao-'+id_opcao).addClass('disabled');
			var array = [id_opcao];

				if(arrayOpcoes=='')
				{
					array = [id_opcao];
					$('#opcoes').val(JSON.stringify(array));
				}else
				{
					array = JSON.parse(arrayOpcoes);
					array.push(id_opcao);
					$('#opcoes').val(JSON.stringify(array));
				}
			removerOpcao();
		});
	}

	function removerOpcao(){
		$("#removerOpcao").on('click', function(){
			var id_opcao = $(this).attr("data-id");
			var arrayOpcoes = $('#opcoes').val();
			$('#opcao-'+id_opcao).removeClass('disabled');
			$(this).remove();
			array = JSON.parse(arrayOpcoes);
			array = AcharRemoverOpcao(array, id_opcao,'add');
			removerOpcao();
		});
	}


	function AcharRemoverOpcao(array, value, $type) {
		console.log($type);
		if($type=='add'){
			$.each(array, function(index, result) {
				if(result == value) {
					array.splice(index, 1);
				}    
			});
		$('#opcoes').val(JSON.stringify(array));
		removerOpcao();
		}else{
			$.each(array, function(index, result) {
				if(result == value) {
					array.splice(index, 1);
				}    
			});
		$('#opcoesEdit').val(JSON.stringify(array));
		}
	}
// end Historia


// Missao


// end Missao

