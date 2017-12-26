
<table class="table table-striped table-bordered table-hover table-checkable order-column" id='tabelaUsu'>
    <thead>
        <tr>
            <th>
                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                    <span></span>
                </label>
            </th>
            <th> Foto perfil</th>
            <th> Nome </th>
            <th> email </th>
            <th> grupo </th>
            <th> Nível </th>
            <th> Acesso </th>
            <th> Status </th>
            <th> Atualização em: </th>
            <th> Ações </th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $user) { ?>

        <tr class="odd gradeX">
            <td>
                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                    <input type="checkbox" class="checkboxes" value="1" />
                    <span></span>
                </label>
            </td>
            <td>
                <div class="avatar">
                    <?php if($user['foto']|| $user['foto'] != '' ){ ?>
                      <img src="{{$user['foto']}}" style="width:40px;height:40px;">
                    <?php }else{ ?>
                      <img src="{{ url('/')}}/img/profile/adcionarfoto.png" style="width:40px;height:40px;">
                    <?php } ?>
                </div>
            </td>
            <td> <?php echo $user['nome'] ?> </td>
            <td> <?php echo $user['email'] ?> </td>
            <td> <?php echo $user['grupo'] ?> </td>
            <td> <?php echo $user['nivel'] ?> </td>
            <td> <?php echo $user['acesso'] ?> </td>
            <td> <?php echo $user['status'] ?> </td>
            <td class="center">
                <?php echo date('d/m/Y h:m:s', strtotime($user['updated_at']));?>
            </td>  
            <td>

            <a href="{{ url('/usuario/view') }}/<?php echo $user['uid'];?>" class="btn btn-icon-only green" title='Visualizar'>
            <i class="fa fa-eye"></i>
            </a>
             <a href="#" data-delete="{{ url('/motorista/delete') }}/<?php echo $user['uid'];?>" data-nome="<?php echo @$user['nome']; ?>" data-email="<?php echo @$user['email']; ?>" class="btn delete-passageiro btn-icon-only red" title='Deletar'>
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