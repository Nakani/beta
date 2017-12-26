@extends('default.default')

@section('title', 'Missões')

@section('content')
<!--     <script src="{{ url('/') }}/scripts/usuarios.js" type="text/javascript"></script> -->

    <h1 class="page-title"> Missões 
        <small>Gerencie Missões</small>
    </h1>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> 
                            Gerenciar Missoes</h3>
                         </span>
                    </div>
                </div>
                <div class="row col-md-12">
                    @if(Session::has('message'))
                        <div class='alert alert-success'>
                        {{Session::get('message')}}
                        </div>
                    @endif
                </div>
                <div class="row col-md-10">
                    <div class="col-md-3">
                        <input type="text" id='campoBusca' class="form-control input-lg" placeholder="Buscar...">
                    </div>
                    <div class="col-md-3">
                        <select class="form-control input-lg" id='coluna'>
                            <option value=''>selecione a coluna</option>
                            <option value='nome'>Nome</option>
                            <option value='email'>cliente</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button class="btn green" id='pesquisar'>Filtrar</button>
                    </div>
                </div>
                <div class="row col-md-2">
                    <div class="col-md-3">
                    <a href="<?php echo url('/missao/adicionar').'/'.$id;?>">
                            <button class="btn default" id='sendSearch'>
                            <i class='fa fa-user-plus'></i> Adicionar Missão
                            </button>
                    </a>
                    </div>
                </div>

                <div class="portlet-body">                                           
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id='tabelaUsu'>
                        <thead>
                            <tr>
                                <th>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                        <span></span>
                                    </label>
                                </th>
                                <th> Titulo </th>
                                <th> Descrição </th>
                                <th> Tipo </th>
                                <th> Ações </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $value) {?>

                            <tr class="odd gradeX">
                                <td>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="checkboxes" value="1" />
                                        <span></span>
                                    </label>
                                </td>
                                <td> <?php echo $value['titulo'] ?> </td>
                                <td> <?php echo $value['descricao'] ?> </td>
                                  <td> <?php echo $value['tipo'] ?> </td>
                                <td>
                                <a href="<?php echo url('/missao/editar').'/'.$value['id'];?>" class="btn btn-icon-only green desativado" title='Editar'>
                                <i class="fa fa-eye"></i>
                                </a>
                                 <a href="#" data-delete="<?php echo url('/missao/delete').'/'.$value['id'];?>" data-nome="<?php echo @$value['titulo']; ?>" class="btn apagar btn-icon-only red" title='Deletar'>
                                  <i class="fa fa-trash desativado"></i>
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
            <h4 class="modal-title" id="myModalLabel">Remover  </h4>
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

    <script type="text/javascript">
        


    </script>

@endsection
