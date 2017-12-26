$(function(){
   $(document).on('click', '.delete-cliente', function(e){

     var nome = $(this).attr("data-nome");
     var email = $(this).attr("data-email");
     var link_delete = $(this).attr("data-delete");
     e.preventDefault();
     $("#delete-cliente").find(".modal-body").html(
       '<p> Você tem certeza que deseja remover esse cliente?</p>'+
       '<p><strong>'+nome+'</strong>' +
       '<h5>'+email+'<h5></p>'
     )
     $("#delete-cliente").find("#confirm").attr("href", link_delete)
     $("#delete-cliente").modal();
     return false
   });

	$("#usu .pagination a").on('click', function(){
		e.preventDefault();
		$('.portlet-body').html('<img src="'+url+'/img/clock-loading.gif">');
		var page = $(this).attr('href').split('page=')[1];
		//function
		//getpaginaUsu(page);
	});

  pesquisar();
});


  function pesquisar(){
    $("#pesquisar").on('click', function(){
      var paginate = $('#paginate').val();
      var busca      = $('#campoBusca').val(); 
      var coluna  = $('#coluna').val();
      console.log(campoBusca);
      console.log(coluna);
      alert('Função indisponível no momento');

      $('.portlet-body').html('<img src="'+url+'/img/loading-search.gif">');
      $.ajax({
        url: url+'/motoristas/pesquisar',
        data: {'paginate':paginate,'busca':busca,'coluna':coluna},
        dataType:'html',
        success: function(data) {
          $('.portlet-body').html(data);

        }
      });
      
    });
  }