

<?php $__env->startSection('content'); ?>
  <?php $arrayCrumbs = [ trans('backoffice.Admins') => route('adminPageB') ]; ?>
  <?php echo $__env->make('backoffice/includes/crumbs', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="page-titulo">
    <?php echo e(trans('backoffice.Admins')); ?>

  </div>

  <a href="<?php echo e(route('adminNewPageB')); ?>" class="abt bt-verde modulo-botoes"><i class="fas fa-plus"></i> <?php echo e(trans('backoffice.addNew')); ?></a>
  
  <div class="modulo-table">
    <div class="modulo-scroll">
      <table class="modulo-body" id="sortable">
        <thead>
          <tr>
            <th class="display-none"></th>
            <th>#</th>
            <th><?php echo e(trans('backoffice.Image')); ?></th>
            <th><?php echo e(trans('backoffice.Name')); ?></th>
            <th><?php echo e(trans('backoffice.Email')); ?></th>
            <th><?php echo e(trans('backoffice.lastAcess')); ?></th>
            <th><?php echo e(trans('backoffice.Type')); ?></th>
            <th><?php echo e(trans('backoffice.Status')); ?></th>
            <th><?php echo e(trans('backoffice.Option')); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr id="linha_<?php echo e($val['id']); ?>">
            <td class="display-none"></td>
            <td><?php echo e($val['id']); ?></td>
            <td><?php echo $val['avatar']; ?></td>
            <td><?php echo e($val['nome']); ?></td>
            <td><?php echo e($val['email']); ?></td>
            <td><?php echo $val['ultimo']; ?></td>
            <td><?php echo $val['tipo']; ?></td>
            <td><?php echo $val['estado']; ?></td>
            <td class="table-opcao">
            <a href="<?php echo e(route('adminEditPageB',$val['id'])); ?>" class="table-opcao"><i class="fas fa-pencil-alt"></i>&nbsp;<?php echo e(trans('backoffice.Edit')); ?></a>&ensp;
            <span class="table-opcao" onclick="$('#id_modal').val(<?php echo e($val['id']); ?>);" data-toggle="modal" data-target="#myModalDelete">
              <i class="far fa-trash-alt"></i>&nbsp;<?php echo e(trans('backoffice.Delete')); ?>

            </span>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php if(!isset($val['id'])): ?> <tr><td colspan="8"><?php echo e(trans('backoffice.noRecords')); ?></td></tr> <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal Delete -->
  <div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <input type="hidden" name="id_modal" id="id_modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header"><h4 class="modal-title"><?php echo e(trans('backoffice.Delete')); ?></h4></div>
        <div class="modal-body"><?php echo trans('backoffice.DeleteUser'); ?></div>
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
  function apagarLinha(){
    var id = $('#id_modal').val();
    $.ajax({
      type: "POST",
      url: '<?php echo e(route('adminAllApagarB')); ?>',
      data: { id:id },
      headers:{ 'X-CSRF-Token':'<?php echo csrf_token(); ?>' }
    })
    .done(function(resposta) {
      if(resposta=='sucesso'){
        $('#linha_'+id).slideUp();
      }
    });
  }
  //<!-- PAGINAR -->
  $(document).ready(function(){
    $('#sortable').dataTable({
      aoColumnDefs: [{ "bSortable": false, "aTargets": [ 0,2,8 ] }],
      lengthMenu: [[20,50,-1], [20,50,'<?php echo e(trans('backoffice.All')); ?>']],
    });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backoffice/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>