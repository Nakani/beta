@extends('default.default')

@section('title', 'Adicionar Missao')
@section('content')
    <h1 class="page-title"> Adicionar Missão <?php //echo App\Utils::getNomeCampanha($id);?></h1>

    <div class="profile">
		<div class="tabbable-line tabbable-full-width">
		    <div class="row profile-account">
		        <div class="col-md-12">
		            <form role="form" action="<?php echo url('/missao/save'); ?>" method="POST" enctype="multipart/form-data">
 						<input type="hidden" name="_token" value="{{ csrf_token() }}">
 						<input type="hidden" name="id_fase" value="<?php echo $id_fase;?>">
	                        <div class="form-group col-md-4">
	                            <label for="nome">Titulo:</label>
	                            <input type="text" class="form-control" required id="titulo" name="titulo" placeholder="Titulo">
	                        </div> 

	                        <div class="form-group col-md-12">
	                            <label for="nome">Descrição da missão:</label>
									<textarea class="wysihtml5 form-control" rows="6" name='descricao'></textarea>
                            </div>

		                    <div class="form-group col-md-4">
		                    	<label for="nome">Tipo:</label>
		                        <select class="form-control input-lg" id='tipo' name='tipo'>
		                            <option value=''>Selecione</option>
		                            <option value='1'>Checkin</option>
		                            <option value='2'>Palavra Passe</option>
		                            <option value='3'>Checkin + Palavra Passe</option>
		                        </select>
		                    </div>

	                        <div class="form-group col-md-4">
	                            <label for="nome">Endereço checkin:</label>
	                            <input type="text" class="form-control input-lg" id="endereco" name="endereco" placeholder="Endereço Completo Rua, bairro, cidade">
	                        </div> 
	                        <div class="form-group col-md-4">
	                            <label for="nome">Palavra Chave:</label>
	                            <input type="text" class="form-control input-lg" id="palavraChave" name="palavraChave" placeholder="Palavra chave ">
	                        </div> 

	                    <div class="col-md-12">
	                  		<div class="form-group col-md-4">
	                        </div>
	                        <div class="form-group col-md-4 ">
	                        	<button class="btn btn-lg btn-primary btn-block" type="submit">Salvar</button>
	                        </div>		                                
	                        <div class="form-group col-md-4">
	                        </div>
	                    </div>
		            </form>		            
		        </div>
		        <!--end col-md-9-->
		    </div>
		</div>
	</div>  

@endsection
