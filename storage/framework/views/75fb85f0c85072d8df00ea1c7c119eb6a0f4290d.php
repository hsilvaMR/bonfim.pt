

<?php $__env->startSection('content'); ?>
	<?php $arrayCrumbs = [ trans('backoffice.Contacts') => route('contactsPageB') ]; ?>
  	<?php echo $__env->make('backoffice/includes/crumbs', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div class="page-titulo">
	  	<?php echo e(trans('backoffice.Contacts')); ?>

	  	<div class="page-informacao" data-toggle="modal" data-target="#myModalInformation"><i class="fas fa-info"></i></div>
	</div>

	<div class="modulo-table">
  		<div class="modulo-scroll">
  	  		<table class="modulo-body" id="sortable">
  	    		<thead>
  	      			<tr>
            			<th class="display-none"></th>
    		    		  <th>#</th>
			            <th><?php echo e(trans('backoffice.Name')); ?></th>
                  <th><?php echo e(trans('backoffice.Contact')); ?></th>
			            <th><?php echo e(trans('backoffice.Date')); ?></th>
			            <th><?php echo e(trans('backoffice.Option')); ?></th>
    		  		</tr>
    			</thead>
        		<?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      				<tbody>
            			<tr id="linha_<?php echo e($val->id); ?>">
			            	<td class="display-none"></td>
			              	<td><?php echo e($val->id); ?></td>
			              	<td><?php echo e($val->nome); ?></td>
                      <td><?php if($val->id_lote != ''): ?> <span class="tag tag-ouro">Apartamento</span> <?php else: ?> <span class="tag tag-azul">Site</span> <?php endif; ?></td>
			              	<td><?php echo e(date('Y-m-d H:i:s',$val->data)); ?></td>
			              	<td class="table-opcao">
			              		<a href="<?php echo e(route('contactsDetailsPageB',$val->id)); ?>" class="table-opcao">
			                  		<i class="fas fa-search-plus"></i>&nbsp;<?php echo e(trans('backoffice.Details')); ?>

			                	</a>&ensp;

			                	<span class="table-opcao" onclick="$('#id_modal').val(<?php echo e($val->id); ?>);" data-toggle="modal" data-target="#myModalDelete">
			                  		<i class="fas fa-trash-alt"></i>&nbsp;<?php echo e(trans('backoffice.Delete')); ?>

			                	</span>
			              	</td>
            			</tr>
      	  			</tbody>
        		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  	  		</table>
  		</div>
  	</div>

  
  	<!-- Modal Information -->
  	<div class="modal fade" id="myModalInformation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    	<div class="modal-dialog" role="document">
      		<div class="modal-content">
        		<div class="modal-header"><h4 class="modal-title"><?php echo e(trans('backoffice.dashboardTt')); ?></h4></div>
        		<div class="modal-body"><?php echo trans('backoffice.contactsTx'); ?></div>
        		<div class="modal-footer"><button type="button" class="bt bt-azul" data-dismiss="modal"><i class="fas fa-check"></i> <?php echo e(trans('backoffice.Ok')); ?></button></div>
      		</div>
    	</div>
  	</div>

  	<!-- Modal Delete -->
  	<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    	<input type="hidden" name="id_modal" id="id_modal">
    	<div class="modal-dialog" role="document">
      		<div class="modal-content">
        		<div class="modal-header"><h4 class="modal-title" id="myModalLabel"><?php echo e(trans('backoffice.Delete')); ?></h4></div>
        		<div class="modal-body"><?php echo trans('backoffice.DeleteLine'); ?></div>
        		<div class="modal-footer">
          			<button type="button" class="bt bt-cinza" data-dismiss="modal"><i class="fas fa-times"></i> <?php echo e(trans('backoffice.Cancel')); ?></button>&nbsp;
          			<button type="button" class="bt bt-vermelho" data-dismiss="modal" onclick="apagarLinha();"><i class="fas fa-trash-alt"></i> <?php echo e(trans('backoffice.Delete')); ?></button>
        		</div>
      		</div>
    	</div>
  	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<!-- PAGINAR -->
<link href="<?php echo e(asset('backoffice/vendor/datatables/jquery.dataTables.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<!-- PAGINAR -->
<script src="<?php echo e(asset('backoffice/vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
<script type="text/javascript">  
  //<!-- PAGINAR -->
  	$(document).ready(function(){
    	$('#sortable').dataTable({
      		aoColumnDefs: [{ "bSortable": false, "aTargets": [ 0,4 ] }],
      		lengthMenu: [[20,50,-1], [20,50,'<?php echo e(trans('backoffice.All')); ?>']],
    	});
  	});

	function apagarLinha(){
		var id = $('#id_modal').val();

		$.ajax({
			type: "POST",
		  	url: '<?php echo e(route('deleteLineTMB')); ?>',
		  	data: { tabela:'bonfim_contactos', id:id },
		  	headers:{ 'X-CSRF-Token':'<?php echo csrf_token(); ?>' }
		})
		.done(function(resposta) {
		  	if(resposta=='sucesso'){
		    	$('#linha_'+id).slideUp();
		    	$.notific8('<?php echo e(trans('backoffice.savedSuccessfully')); ?>');
		  	}else{ $.notific8(resposta, {color:'ruby'}); }
		});
	}

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backoffice/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>