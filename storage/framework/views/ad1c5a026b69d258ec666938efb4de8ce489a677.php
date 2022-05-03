

<?php $__env->startSection('content'); ?>
	<div class="bonfim-preto" style="text-align:center;padding:75px 0px;height:calc(100% - 190px);">
	
		<div style="position: relative;top: 50%;transform: translateY(-50%); ">

			<img height="75" src="/img/site/icon_unsubscribe.svg">
			<p style="margin:30px;font-size:24px;"><?php if($lingua == 'pt'): ?>Subscrição cancelada com sucesso!<?php else: ?> Subscription canceled successfully!<?php endif; ?></p>

			<a href="<?php echo e(route('bonfimInfoPage')); ?>"><button class="bonfim-bt"><?php if($lingua == 'pt'): ?> VOLTAR AO SITE <?php else: ?> BACK TO SITE <?php endif; ?> </button></a>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site/layouts/default-bonfim', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>