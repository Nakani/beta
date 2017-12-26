
<link href="{{ url('/') }}/scripts/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="{{ url('/') }}/scripts/global/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('/') }}/scripts/global/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" />

@extends('default.default')

@section('title', 'Visualizar Membro')
@section('view_script')

@endsection

@section('content')
    <h1 class="page-title"> Visualizar Membro
        <small>ID</small>
    </h1>
    <div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{ url('/cadastro/aprovacao') }}">Cadastro</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>editar cadastro</span>
        </li>
    </ul>
    </div>
                    <div class="profile">
                        <div class="row col-md-12">
                            @if(Session::has('message'))
                                <div class='alert alert-success'>
                                {{Session::get('message')}}
                                </div>
                            @endif
                        </div>

                        <div class="tabbable-line tabbable-full-width">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab"> Perfil </a>
                                </li>
                                <li>
                                    <a href="#tab_1_3" data-toggle="tab"> Conta </a>
                                </li>
                                <li>
                                    <a href="#tab_1_4" data-toggle="tab"> Resumo </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1_1">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <ul class="list-unstyled profile-nav">
                                                <li>
                                                    <img src="<?php echo $membro['avatar']?>" class="img-responsive pic-bordered" alt="" />   
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-8 profile-info">
                                                    <h1 class="font-green sbold uppercase"><?php echo $membro['nome'] ;?></h1>
                                                    <p> </p>
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-map-marker"></i> <?php echo $membro['nome_cliente'] ?> </li>
                                                        <li>
                                                            <i class="fa fa-phone"></i> <?php echo $membro['telefone'] ?> 
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-industry"></i> <?php echo $membro['setor'] ?> 
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-black-tie"></i> <?php echo $membro['cargo'] ?> 
                                                        </li>
                                                    </ul>
                                                    <p>
                                                        <a href="javascript:;"> <?php echo $membro['email']?> </a>
                                                    </p>
                                                    <p>
                                                        <a href="javascript:;">CPF: <?php echo $membro['cpf']?> </a>
                                                    </p>
                                                    <p>
                                                        <a href="javascript:;">Conta: <?php echo $membro['conta']?> </a>
                                                    </p>
                                                </div>
                                                <!--end col-md-8-->
                                                <div class="col-md-4">
                                                    <div class="portlet sale-summary">
                                                        <div class="portlet-title">
                                                            <div class="caption font-red sbold"> Pontuação de <?php echo $membro['nome'] ;?>  </div>
                                                            <div class="tools">
                                                                <a class="reload" href="javascript:;"> </a>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <ul class="list-unstyled">
                                   
                                                                <li>
                                                                    <span class="sale-info">História: 
                                                                        <i class="fa fa-img-up"></i>
                                                                    </span>
                                                                    <span class="sale-num"> <?php echo $pontuacao['pontuacao_historia'];?> </span>
                                                                </li>                                       
                                                                <li>
                                                                    <span class="sale-info">Teste: 
                                                                        <i class="fa fa-img-up"></i>
                                                                    </span>
                                                                    <span class="sale-num"> <?php echo $pontuacao['pontuacao_teste'];?> </span>
                                                                </li>                                     
                                                                <li>
                                                                    <span class="sale-info">Peer Review: 
                                                                        <i class="fa fa-img-up"></i>
                                                                    </span>
                                                                    <span class="sale-num"> <?php echo $pontuacao['pontuacao_peerreview'];?> </span>
                                                                </li>                                   
                                                                <li>
                                                                    <span class="sale-info">Missão: 
                                                                        <i class="fa fa-img-up"></i>
                                                                    </span>
                                                                    <span class="sale-num"> <?php echo $pontuacao['pontuacao_missao'];?> </span>
                                                                </li>                                  
                                                                <li>
                                                                    <span class="sale-info"><strong>Total:</strong> 
                                                                        <i class="fa fa-img-up"></i>
                                                                    </span>
                                                                    <?php 
                                                                    $total = $pontuacao['pontuacao_historia'] + $pontuacao['pontuacao_teste']+$pontuacao['pontuacao_peerreview']+$pontuacao['pontuacao_missao']
                                                                    ?>

                                                                    <span class="sale-num"><strong><?php echo $total;?> </strong></span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-md-4-->
                                            </div>
                                            <!--end row-->
                                            <div class="tabbable-line tabbable-custom-profile">
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1" data-toggle="tab"> Insígnias concluídas </a>
                                                    </li>
     
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_1">
                                                        <div class="portlet-body">
                                                            <table class="table table-striped table-bordered table-advance table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <i class="fa fa-briefcase"></i> Nome </th>
                                                                        <th class="hidden-xs">
                                                                            <i class="fa fa-question"></i> Descrição </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                                        if($insignias!=NULL){ 
                                                                        foreach($insignias as $insignia):?>
                                                                    <tr>
                                                                        <td>
                                                                            <a href="javascript:;"><?php echo $insignia['nome'];?> </a>
                                                                        </td>
                                                                        <td class="hidden-xs"> <?php echo $insignia['descricao'];?> </td>
                                                                    </tr>
                                                                    <?php endforeach;
                                                                }else
                                                                { ?>
                                                                    <tr>
                                                                        <td>
                                                                            <a href="javascript:;">Nenhuma Insígnia conquistada! </a>
                                                                        </td>
                                                                    </tr>
                                                               <?php  }  ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab_2">
                                                        <div class="portlet-body">
                                                            <table class="table table-striped table-bordered table-advance table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <i class="fa fa-briefcase"></i> Nome </th>
                                                                        <th class="hidden-xs">
                                                                            <i class="fa fa-question"></i> Descrição </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                                        if($insignias!=NULL){ 
                                                                        foreach($insignias as $insignia):?>
                                                                    <tr>
                                                                        <td>
                                                                            <a href="javascript:;"><?php echo $insignia['nome'];?> </a>
                                                                        </td>
                                                                        <td class="hidden-xs"> <?php echo $insignia['descricao'];?> </td>
                                                                    </tr>
                                                                    <?php endforeach;
                                                                }else
                                                                { ?>
                                                                    <tr>
                                                                        <td>
                                                                            <a href="javascript:;">Nenhuma Insígnia conquistada! </a>
                                                                        </td>
                                                                    </tr>
                                                               <?php  }  ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--tab_1_2-->
                                <div class="tab-pane" id="tab_1_3">
                                    <div class="row profile-account">
                                        <div class="col-md-3">
                                            <ul class="list-unstyled profile-nav">
                                                <li>
                                                    <img src="{{url('/')}}/img/avatares/<?php echo $membro['avatar']?>" class="img-responsive pic-bordered" alt="" />   
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="tab-content">
                                                <div id="tab_1-1" class="tab-pane active">
                                                    <form role="form" action="<?php echo url('/membro/update').'/'.$membro['id']; ?>" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <div class="form-group">
                                                        <input type="hidden" value="<?php echo $membro['id']; ?>" class="form-control" id="id" name="id">
                                                            <label class="control-label">Nome</label>
                                                            <input type="text" placeholder="Nome" name='nome' value='<?php echo $membro['nome'];?>' class="form-control" /> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Email</label>
                                                            <input type="text" placeholder="Email" name='email' value='<?php echo $membro['email'];?>' class="form-control" /> </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label">Celular</label>
                                                            <input type="text" placeholder="Celular" name='telefone' value='<?php echo $membro['telefone'];?>' class="form-control" /> 
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label">Cpf</label>
                                                            <input type="text" placeholder="Cpf" name='cpf' value='<?php echo $membro['cpf'];?>' class="form-control" /> 
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label">Setor</label>
                                                            <input type="text" placeholder="Setor" name='setor' value='<?php echo $membro['setor'];?>' class="form-control" /> 
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label">Cargo</label>
                                                            <input type="text" placeholder="Cargo" name='cargo' value='<?php echo $membro['cargo'];?>' class="form-control" /> 
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label">Agência</label>
                                                            <input type="text" placeholder="Agência" name='agencia' value='<?php echo $membro['agencia'];?>' class="form-control" /> 
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label">Conta</label>
                                                            <input type="text" placeholder="Conta" name='conta' value='<?php echo $membro['conta'];?>' class="form-control" /> 
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label">Cidade</label>
                                                            <input type="text" placeholder="Cidade" name='cidade' value='<?php echo $membro['cidade'];?>' class="form-control" /> 
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label">UF</label>
                                                            <input type="text" placeholder="UF" name='uf' value='<?php echo $membro['uf'];?>' class="form-control" /> 
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label">Nova Senha</label>
                                                            <input type="password" placeholder="Nova senha" name='new_password' class="form-control" /> 
                                                        </div>                                                        

                                                        <div class="form-group">
                                                            <label for="nivel">Ativo:</label>
                                                                <select id="single" class="form-control select2" name="nivel" id="nivel">
                                                                <option value="">Selecione...</option>
                                                                <option <?php if($membro['ativo']=='1'){echo 'selected'; } ?> value="1">Ativo </option>
                                                                <option <?php if($membro['ativo']=='0'){echo 'selected'; } ?> value="0">Inativo</option>
                                                            </select>
                                                        </div>

                                                        <div class="margiv-top-10">
                                                            <button class="btn green"> Salvar Alterações </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-md-9-->
                                    </div>
                                </div>
                                <!--tab_1_4-->
                                <div class="tab-pane" id="tab_1_4">
                                    <div class="row profile-account">
                                        <div class="col-md-9">
                                            <ul class="nav nav-tabs">
                                                <?php foreach($fases as $fase):?>
                                                <li>
                                                    <a href="#" class='abaMembro' data-membro='<?php echo $membro['id'];?>' data-idFase='<?php echo $fase['id'];?>' id='fase-<?php echo $fase['id'];?>' data-toggle="tab"><?php echo $fase['nome'];?>  </a>
                                                </li>
                                                <?php endforeach;?> 
                                            </ul>
                                            
                                                <div id="dadosMembro" class="tab-pane">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-md-9-->
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
    <script src="{{ url('/') }}/scripts/global/plugins/bootstrap-table/bootstrap-table.min.js" type="text/javascript"></script>
@endsection
