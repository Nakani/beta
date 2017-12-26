@extends('default.default')

@section('title', 'Lista de membros')

@section('content')
    <script src="{{ url('/') }}/scripts/membros.js" type="text/javascript"></script>

    <h1 class="page-title"> Lista de Membros
        <small>Gerencie Membros do app</small>
    </h1>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Gerenciar membros</span>
                    </div>
                </div>
                <div class="row col-md-12">
                    @if(Session::has('message'))
                        <div class='alert alert-success'>
                        {{Session::get('message')}}
                        </div>
                    @endif
                </div>
                <div class="row col-md-6">
                </div>
                <div class="row col-md-6">
                    <div class="col-md-3">
                    <a href="{{url('/membro/adicionar')}}">
                        <?php if( Auth::user()->nivel=='1' and App\Utils::getPermissaoGrupo(Auth::id())=='1' ):?>
                            <button class="btn default" id='sendSearch'>
                            <i class='fa fa-user-plus'></i> Adicionar Membro
                            </button>
                        <?php endif;?>
                    </a>
                    </div>
                    <div class="col-md-3">
                    <a href="{{url('/membro/adicionarCsv')}}">
                        <?php if( Auth::user()->nivel=='1' and App\Utils::getPermissaoGrupo(Auth::id())=='1' ):?>
                            <button class="btn default" id='sendSearch'>
                            <i class='fa fa-user-plus'></i> Adicionar Membros por CSV
                            </button>
                        <?php endif;?>
                    </a>
                    </div>
                </div>

                <div class="portlet-body">                                           
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id='tabelaUsu'>
                        <thead>
                            <tr>
                                <th> Nome </th>
                                <th> Email </th>
                                <th> Telefone </th>
                                <th> Cliente </th>
                                <th> Atualização em: </th>
                                <th> Ações </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $cliente) {?>

                            <tr class="odd gradeX">
                                <td> <?php echo $cliente['nome'] ?> </td>
                                <td> <?php echo $cliente['email'] ?> </td>
                                <td> <?php echo $cliente['telefone'] ?> </td>
                                <td> <?php echo $cliente['nome_cliente'] ?> </td>
                                <td class="center">
                                    <?php echo date('d/m/Y h:m:s', strtotime($cliente['updated_at']));?>
                                </td>  
                                <td>

                                <a href="<?php echo url('/membro/editar').'/'.$cliente['id'];?>" class="btn btn-icon-only green" title='Visualizar'>
                                <i class="fa fa-eye"></i>
                                </a>
                                 <a href="#" data-delete="{{ url('/membro/delete') }}/<?php echo $cliente['id'];?>" data-nome="<?php echo @$cliente['nome']; ?>" data-email="<?php echo @$cliente['email']; ?>" class="btn apagar btn-icon-only red" title='Deletar'>
                                  <i class="fa fa-trash"></i>
                                </a>
                                </td>
                            </tr>

                        <?php } ?>                                        
                        </tbody>
                    </table>
                    <div class='usu'>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
    <div class="modal fade" id="apagar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Remover membro  </h4>
          </div>
          <div class="modal-body">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
            <a href="#" id="confirm" class="btn btn-danger">Remover</a>
          </div>
        </div>
      </div>
    </div>

@endsection
