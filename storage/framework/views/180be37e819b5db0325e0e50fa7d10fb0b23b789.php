

<?php $__env->startSection('content'); ?>
  <?php $arrayCrumbs = [ trans('backoffice.Dashboard') => route('dashboardPageB') ]; ?>
  <?php echo $__env->make('backoffice/includes/crumbs', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="page-titulo">
  	<?php echo e(trans('backoffice.Dashboard')); ?>

  	<div class="page-informacao" data-toggle="modal" data-target="#myModalInformation"><i class="fas fa-info"></i></div>
  </div>

  <div class="row">
    <div class="col-sm-6 col-lg-3">
	  <div class="modulo-azul">
	  	<div class="modulo-azul-top"><?php echo e($num1); ?><i class="fas fa-users"></i></div>
	  	<a href="<?php echo e(route('adminPageB')); ?>">
	  	  <div class="modulo-azul-bottom"><?php echo e(trans('backoffice.Admins')); ?><i class="fas fa-arrow-circle-right"></i></div>
	  	</a>
	  </div>
    </div>    
    <div class="col-sm-6 col-lg-3">
	  <div class="modulo-azul">
	  	<div class="modulo-azul-top"><?php echo e($num2); ?><i class="far fa-building"></i></div>
	  	<a href="<?php echo e(route('apartmentsPageB')); ?>">
	  	  <div class="modulo-azul-bottom"><?php echo e(trans('backoffice.Apartments')); ?><i class="fas fa-arrow-circle-right"></i></div>
	  	</a>
	  </div>
    </div>
    <div class="col-sm-6 col-lg-3">
	  <div class="modulo-azul">
	  	<div class="modulo-azul-top"><?php echo e($num3); ?><i class="fas fa-phone"></i></div>
	  	<a href="<?php echo e(route('contactsPageB')); ?>">
	  	  <div class="modulo-azul-bottom"><?php echo e(trans('backoffice.Contacts')); ?><i class="fas fa-arrow-circle-right"></i></div>
	  	</a>
	  </div>
    </div>
    <div class="col-sm-6 col-lg-3">
	  <div class="modulo-azul">
	  	<div class="modulo-azul-top"><?php echo e($num4); ?><i class="far fa-newspaper"></i></div>
	  	<a href="<?php echo e(route('newsletterPageB')); ?>">
	  	  <div class="modulo-azul-bottom"><?php echo e(trans('backoffice.Newsletter')); ?><i class="fas fa-arrow-circle-right"></i></div>
	  	</a>
	  </div>
    </div>
  </div>

  <div class="row">
  	<div class="col-lg-6">
  		<div class="modulo-dashboard">
			<div class="modulo-head">
				<?php echo e(trans('backoffice.latestAdmins')); ?>

				<a href="<?php echo e(route('adminPageB')); ?>"><?php echo e(trans('backoffice.goToPage')); ?> <i class="fas fa-arrow-circle-right"></i></a>
			</div>
			<table class="modulo-body">
				<?php $__currentLoopData = $lista1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				    <tr>
				      <td>
				      	<?php echo $list->nome; ?> | <?php echo $list->email; ?>

				      </td>
				    </tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php if(empty($lista1)): ?> <tr><td><font class="tx-cinza"><?php echo e(trans('backoffice.noRecords')); ?></td></tr></font> <?php endif; ?>
			</table>
	  	</div>
  	</div>
  	<div class="col-lg-6">
  		<div class="modulo-dashboard">
			<div class="modulo-head">
				<?php echo e(trans('backoffice.latestContacts')); ?>

				<a href="<?php echo e(route('contactsPageB')); ?>"><?php echo e(trans('backoffice.goToPage')); ?> <i class="fas fa-arrow-circle-right"></i></a>
			</div>
			<table class="modulo-body">
				<?php $__currentLoopData = $lista2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				    <tr>
				      <td>
				      </td>
				    </tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php if(empty($lista2)): ?> <tr><td><font class="tx-cinza"><?php echo e(trans('backoffice.noRecords')); ?></td></tr></font> <?php endif; ?>			  
			</table>
	  	</div>
  	</div>
  </div>

  
  <!-- Modal Information -->
  <div class="modal fade" id="myModalInformation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header"><h4 class="modal-title"><?php echo e(trans('backoffice.dashboardTt')); ?></h4></div>
        <div class="modal-body"><?php echo trans('backoffice.dashboardTx'); ?></div>
        <div class="modal-footer"><button type="button" class="bt bt-azul" data-dismiss="modal"><i class="fas fa-check"></i> <?php echo e(trans('backoffice.Ok')); ?></button></div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backoffice/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>