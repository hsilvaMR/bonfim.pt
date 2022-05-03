

<?php $__env->startSection('content'); ?>
  <?php if(isset($contacts->id)): ?><?php $arrayCrumbs = [ trans('backoffice.Contacts') => route('contactsPageB') , trans('backoffice.Contact_Details') => route('contactsDetailsPageB',['id'=>$contacts->id])]; ?><?php endif; ?>
  <?php echo $__env->make('backoffice/includes/crumbs', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="page-titulo">
    <?php echo e(trans('backoffice.Contact_Details')); ?>

  </div>

  <?php if($contacts->id_lote != '' ): ?>
    <div><label class="lb">Pedido de contacto no apartamento <?php echo e($apartamento->fracao); ?></label></div>
  <?php endif; ?>

  <div class="row">
    <div class="col-lg-9">
      <label class="lb"><?php echo e(trans('backoffice.Name')); ?></label>
      <label class="lb-solid"><?php echo e($contacts->nome); ?></label>
    </div>
    <div class="col-lg-3">
      <label class="lb"><?php echo e(trans('backoffice.Date')); ?></label>
      <label class="lb-solid"><?php echo date('d/m/Y',$contacts->data); ?></label>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <label class="lb"><?php echo e(trans('backoffice.Contact')); ?></label>
      <label class="lb-solid"><?php echo e($contacts->telefone); ?></label>
    </div>
    <div class="col-lg-6">
      <label class="lb"><?php echo e(trans('backoffice.Email')); ?></label>
      <label class="lb-solid"><a href="mailto:<?php echo $contacts->email; ?>"><?php echo e($contacts->email); ?></a></label>
    </div>
  </div>

  
  
  <label class="lb"><?php echo e(trans('backoffice.Message')); ?></label>
  <label class="lb-solid min-height-100"><?php echo nl2br($contacts->mensagem); ?></label>
  

  <div class="clearfix height-20"></div>
  <a href="<?php echo e(route('contactsPageB')); ?>" class="abt bt-azul float-right"><i class="fas fa-arrow-left"></i> <?php echo e(trans('backoffice.Back')); ?></a>
<?php $__env->stopSection(); ?>





    
 



<?php echo $__env->make('backoffice/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>