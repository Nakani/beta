<div class="col-md-9">
	<div class="portlet-body">
	    <table class="table table-striped table-bordered table-advance table-hover">
	        <thead>
	            <tr>
	                <th>Início da historia </th>
	                <th>Finalização da história</th>
	                <th>Finalização do teste</th>
	                <th>Finalização do Peer-Review</th>
	                <th>Finalização de missões</th>
	            </tr>
	        </thead>
	        <tbody>
	            <tr>
	                <td> <?php echo $verificaStatusGeral['historiaInicio'];?> </td>
	                <td class="hidden-xs"> <?php echo $verificaStatusGeral['historiaFinal'];?> </td>
	                <td class="hidden-xs"> <?php echo $verificaStatusGeral['teste'];?> </td>
	                <td class="hidden-xs"> <?php echo $verificaStatusGeral['peerReview'];?> </td>
	                <td class="hidden-xs"> <?php echo $verificaStatusGeral['missao'];?> </td>
	            </tr>
	        </tbody>
	    </table>
	</div>
</div>
