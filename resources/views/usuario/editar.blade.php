        <link href="{{ url('/') }}/scripts/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/scripts/global/plugins/jquery-multi-select/css/multi-select.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/scripts/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/scripts/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />


@extends('default.default')

@section('title', 'Visualizar usuário')
@section('content')
    <h1 class="page-title"> Visualizar usuário
        <small>ID: <?php echo $usuario['id'];
         ?></small>
    </h1>

    @if(Session::has('message'))
        <div class='alert alert-success'>
            {{Session::get('message')}}
        </div>
    @endif
    
    <div class="profile">
		<div class="tabbable-line tabbable-full-width">
		    <div class="row profile-account">
		        <div class="col-md-12">
		            <form role="form" action="<?php echo url('/usuario/update').'/'.$usuario['id']; ?>" method="POST" enctype="multipart/form-data">
	                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	                    <input type="hidden" value="<?php echo $usuario['id']; ?>" class="form-control" id="id" name="id">
	                    <div class="row">
	                        <div class="form-group col-md-12">
	                            <label for="nome">Nome:</label>
	                            <input type="text" value="<?php echo $usuario['nome']; ?>" class="form-control" required id="nome" name="nome" placeholder="Nome">
	                        </div>
   
	                        <div class="form-group col-md-6">
	                            <label for="email">Email:</label>
	                            <input type="email" value="<?php echo $usuario['email']; ?>" class="form-control" required id="email" name="email" placeholder="Email">
	                        </div>   
	                        <div class="form-group col-md-6">
	                            <label for="password">Nova Senha:</label>
	                            <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Nova Senha">
	                        </div>
	                        <div class="form-group col-md-6">
	                            <label for="telefone">Telefone:</label>
	                            <input type="text" value="<?php echo $usuario['telefone']; ?>" class="form-control" required id="telefone" name="telefone" placeholder="telefone">
	                        </div>
	                        <div class="form-group col-md-12">
	                        </div>
  
	                       	<div class="form-group col-md-6">
	                            <label for="nivel">Nivel de acesso:</label>
	                            <select id="single" class="form-control select2" name="nivel" id="nivel">
	                                <option value="">Selecione...</option>
	                                <option <?php if($usuario['nivel']=='1'){echo 'selected'; } ?> value="1">Root (Adiciona, Edita, Apaga) </option>
	                                <option <?php if($usuario['nivel']=='2'){echo 'selected'; } ?> value="2">Administrativo (Edita, Apaga)</option>
	                                <option <?php if($usuario['nivel']=='3'){echo 'selected'; } ?> value="3">Usuário(Somente Visualiza)</option>
	                            </select>
	                        </div>

	                        <div class="form-group col-md-6">
	                            <label for="grupo">Grupo:</label>
	                            <select id="single" class="form-control select2" name="grupo_id" id="grupo">
	                                <option value="">Selecione...</option>
	                                <?php foreach($grupos as $grupo):?>
	                                <option <?php if($grupo['id'] == $usuario['grupo_id']){echo 'selected';} ?> value="<?php echo $grupo['id'];?>">
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
                                   			$checked = (in_array($menu['id'], App\Utils::AcessoMenu($usuario['id']))) ? 'checked' : '' ;         	                      		
                                   		?>
	                                        <label class="mt-checkbox"> 
	                                        	<?php echo $menu['nome']?>
	                                            <input <?php echo $checked; ?> type="checkbox" value="<?php echo $menu['id']?>" name="menu[]" />
	                                            <span></span>
	                                        </label>
                                    	<?php endforeach;?>
                                    </div>
                                </div>
                            </div>

	                       	<div class="form-group col-md-6">
	                            <label for="nivel">Ativo:</label>
	                            <select id="single" class="form-control select2" name="nivel" id="nivel">
	                                <option value="">Selecione...</option>
	                                <option <?php if($usuario['ativo']=='1'){echo 'selected'; } ?> value="1">Ativo </option>
	                                <option <?php if($usuario['ativo']=='0'){echo 'selected'; } ?> value="0">Inativo</option>
	                            </select>
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
