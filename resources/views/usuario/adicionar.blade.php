	
<link href="{{ url('/') }}/scripts/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
@extends('default.default')

@section('title', 'Adicionar Usuário')
@section('content')
    <h1 class="page-title"> Adicionar Usuário
    </h1>

    <div class="profile">
		<div class="tabbable-line tabbable-full-width">
		    <div class="row profile-account">
		        <div class="col-md-12">
		            <form role="form" action="<?php echo url('/usuario/save'); ?>" method="POST" enctype="multipart/form-data">
 						<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                        <div class="form-group col-md-12">
	                            <label for="nome">Nome:</label>
	                            <input type="text" class="form-control" required id="nome" name="nome" placeholder="Nome">
	                        </div>
   
	                        <div class="form-group col-md-6">
	                            <label for="email">Email:</label>
	                            <input type="email" class="form-control" required id="email" name="email" placeholder="Email">
	                        </div>   
	                        <div class="form-group col-md-6">
	                            <label for="password">Senha:</label>
	                            <input type="password" class="form-control" required id="password" name="password" placeholder="password">
	                        </div>
	                        <div class="form-group col-md-6">
	                            <label for="telefone">Telefone:</label>
	                            <input type="text" class="form-control" required id="telefone" name="	telefone" placeholder="telefone">
	                        </div>
	                        <div class="form-group col-md-12">
	                        </div>
  
	                       	<div class="form-group col-md-6">
	                            <label for="nivel">Nivel de acesso:</label>
	                            <select id="single" class="form-control select2" name="nivel" id="nivel">
	                                <option value="">Selecione...</option>
	                                <option value="1">Root (Adiciona, Edita, Apaga) </option>
	                                <option value="2">Administrativo (Edita, Apaga)</option>
	                                <option value="3">Usuário(Somente Visualiza)</option>
	                            </select>
	                        </div>

	                        <div class="form-group col-md-6">
	                            <label for="grupo">Grupo:</label>
	                            <select id="single" class="form-control select2" name="grupo_id" id="grupo">
	                                <option value="">Selecione...</option>
	                                <?php foreach($grupos as $grupo):?>
	                                <option value="<?php echo $grupo['id'];?>">
	                                	<?php echo $grupo['nome']?>
	                                </option>
	                            	<?php endforeach;?>
	                            </select>
	                        </div>

                            <div class="form-group col-md-4">
                                <label class="control-label col-md-3">Menu</label>
                                <div class="col-md-9">
                                   
                                    <div class="mt-checkbox-list">
                                   		<?php 
                                   			foreach($menus as $menu): 
                                   		?>
	                                        <label class="mt-checkbox"> 
	                                        	<?php echo $menu['nome']?>
	                                            <input type="checkbox" value="<?php echo $menu['id']?>" name="menu[]" />
	                                            <span></span>
	                                        </label>
                                    	<?php endforeach;?>
                                    </div>
                                </div>
                            </div>


	                    </div>
	                    <div class="row">
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
