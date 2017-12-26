	
<link href="{{ url('/') }}/scripts/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
@extends('default.default')

@section('title', 'Adicionar Membro')
@section('content')
    <h1 class="page-title"> Adicionar Membro
    </h1>

    <div class="profile">
		<div class="tabbable-line tabbable-full-width">
		    <div class="row profile-account">
		        <div class="col-md-12">
		            <form role="form" action="<?php echo url('/membro/save'); ?>" method="POST" enctype="multipart/form-data">
 						<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                        <div class="form-group col-md-12">
	                            <label for="nome">Nome:</label>
	                            <input type="text" class="form-control" required id="nome" name="nome" placeholder="Nome">
	                        </div>
   
	                        <div class="form-group col-md-6">
	                            <label for="email">Email</label>
	                            <input type="text" class="form-control" required id="email" name="email" placeholder="Email Principal">
	                        </div>    
	                        <div class="form-group col-md-6">
	                            <label for="password">Senha:</label>
	                            <input type="password" class="form-control" required id="password" name="password" placeholder="Senha">
	                        </div>

	                        <div class="form-group col-md-6">
	                            <label for="telefone">Telefone:</label>
	                            <input type="text" class="form-control" required id="telefone" name="telefone" placeholder="Telefone">
	                        </div> 
	                        <div class="form-group col-md-6">
	                            <label for="cpf">Cpf:</label>
	                            <input type="text" class="form-control" required id="cpf" name="cpf" placeholder="Cpf">
	                        </div>   
	                        <div class="form-group col-md-6">
	                            <label for="setor">Setor:</label>
	                            <input type="text" class="form-control" required id="setor" name="setor" placeholder="Setor">
	                        </div>   
	                        <div class="form-group col-md-6">
	                            <label for="cargo">Cargo:</label>
	                            <input type="text" class="form-control" required id="cargo" name="cargo" placeholder="Cargo">
	                        </div>   

                           <div class="form-group col-md-6">
                                <label class="control-label">Agência</label>
                                <input type="text" placeholder="Agência" name='agencia' class="form-control" /> 
                            </div>

                            <div class="form-group col-md-6">
                                <label class="control-label">Cidade</label>
                                <input type="text" placeholder="Cidade" name='cidade' class="form-control" /> 
                            </div>

                            <div class="form-group col-md-6">
                                <label class="control-label">UF</label>
                                <input type="text" placeholder="UF" name='uf' class="form-control" /> 
                            </div>
	                        <div class="form-group col-md-6">
	                            <label for="cliente">Cliente:</label>
	                            <select id="single" class="form-control select2" name="id_cliente" id="cliente">
	                                <option value="">Selecione...</option>
	                                <?php foreach($clientes as $cliente):?>
	                                <option value="<?php echo $cliente['id'];?>">
	                                	<?php echo $cliente['nome']?>
	                                </option>
	                            	<?php endforeach;?>
	                            </select>
	                        </div>

	                        <div class="form-group col-md-12">
                                <label class="control-label col-md-3">Atributos</label>
                                <div class="col-md-9">
                                   
                                    <div class="mt-checkbox-list">
                                   		<?php 
                                   			foreach($atributos as $atributo): 
                                   		?>
	                                        <label class="mt-radio"> 
	                                        	<?php echo $atributo['nome']?>
	                                            <input type="radio" value="<?php echo $atributo['id']?>" name="atributo" />
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
<script src="{{ url('/') }}/scripts/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
@endsection
